<?php

namespace Shoko\TwitchApiBundle\Tests\Repository;

use Shoko\TwitchApiBundle\Repository\UserRepository;
use Shoko\TwitchApiBundle\Factory\UserFactory;
use Shoko\TwitchApiBundle\Lib\Client;

use Prophecy\Prophet;
use Prophecy\Argument;

use GuzzleHttp\Client as Guzzle;
use Shoko\TwitchApiBundle\Model\Entity\ValueObject\Url;

/**
 * UserRepositoryTest class.
 */
class UserRepositoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Prophet $prophet
     * @var Prophet
     */
    private $prophet;

    /**
     * {@inheridoc}
     */
    protected function setup()
    {
        $this->prophet = new Prophet;
    }

    /**
     * Test get user method.
     */
    public function testGetUser()
    {
        $body = json_encode([
          'type' => 'user',
          'name' => 'test_user1',
          'created_at' => '2011-06-03T17:49:19Z',
          'updated_at' => '2012-06-18T17:19:57Z',
          '_links' => [
            'self'    => 'https://api.twitch.tv/kraken/users/test_user1',
            'another_key' => 'another_value',
          ],
          'logo' => 'http://static-cdn.jtvnw.net/jtv_user_pictures/test_user1-profile_image-62e8318af864d6d7-300x300.jpeg',
          '_id' => 21229404,
          'display_name' => 'test_user1',
          'bio' => 'test bio woo I\'m a test user'
        ]);

        $client = $this->prophet->prophesize('Shoko\TwitchApiBundle\Lib\Client');
        $response = $this->prophet->prophesize('GuzzleHttp\Psr7\Response');

        $client->get(Argument::Any())->willReturn($response->reveal());
        $response->getBody()->willReturn($body);

        $factory = new UserFactory;
        $repository = new UserRepository($client->reveal(), $factory);

        $user = $repository->getUser();

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\User', $user);
        $this->assertEquals('21229404', $user->getId());
        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\ValueObject\Link', $user->getLinks()[0]);
        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\ValueObject\Link', $user->getLinks()[1]);
    }

    /**
     * {@inheridoc}
     */
    protected function tearDown()
    {
        $this->prophet->checkPredictions();
    }
}
