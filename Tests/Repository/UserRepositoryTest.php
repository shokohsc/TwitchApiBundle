<?php

namespace Shoko\TwitchApiBundle\Tests\Lib;

use Shoko\TwitchApiBundle\Repository\UserRepository;
use Shoko\TwitchApiBundle\Factory\UserFactory;
use Shoko\TwitchApiBundle\Model\Entity\User;
use Shoko\TwitchApiBundle\Util\JsonTransformer;
use Prophecy\Prophet;

/**
 * UserRepositoryTest class.
 */
class UserRepositoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Prophet $prophet.
     *
     * @var Prophet
     */
    private $prophet;

    /**
     * {@inheridoc}.
     */
    protected function setup()
    {
        $this->prophet = new Prophet();
    }

    /**
     * Test Get user method.
     */
    public function testGetUser()
    {
        $client = $this->prophet->prophesize('Shoko\TwitchApiBundle\Lib\Client');
        $factory = new UserFactory();
        $transformer = new JsonTransformer();
        $repository = new UserRepository($client->reveal(), $factory, $transformer);

        $response = $this->prophet->prophesize('GuzzleHttp\Psr7\Response');
        $client->get(User::ENDPOINT.'some_user')->willReturn($response->reveal());

        $body = $this->prophet->prophesize();
        $body->willImplement('Psr\Http\Message\StreamInterface');
        $response->getBody()->willReturn($body->reveal());

        $content = '{"display_name":"Test_user1","_id":22747064,"name":"test_user1","type":"user","bio":null,"created_at":"2011-06-02T20:04:03Z","updated_at":"2016-02-03T21:15:16Z","logo":"https://static-cdn.jtvnw.net/jtv_user_pictures/test_user1-profile_image-ac0a2f0d39dda770-300x300.jpeg","_links":{"self":"https://api.twitch.tv/kraken/users/test_user1"}}';
        $body->getContents()->willReturn($content);

        $result = $repository->getUser('some_user');
        $expected = (new UserFactory())->createEntity(json_decode($content, true));

        $this->assertEquals($expected, $result);
    }

    /**
     * {@inheridoc}.
     */
    protected function tearDown()
    {
        $this->prophet->checkPredictions();
    }
}
