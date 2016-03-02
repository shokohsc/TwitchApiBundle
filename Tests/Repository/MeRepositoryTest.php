<?php

namespace Shoko\TwitchApiBundle\Tests\Lib;

use Shoko\TwitchApiBundle\Repository\MeRepository;
use Shoko\TwitchApiBundle\Factory\MeFactory;
use Shoko\TwitchApiBundle\Util\JsonTransformer;
use Prophecy\Prophet;

/**
 * MeRepositoryTest class.
 */
class MeRepositoryTest extends \PHPUnit_Framework_TestCase
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
     * Test Get authenticated user method.
     */
    public function testGetMe()
    {
        $client = $this->prophet->prophesize('Shoko\TwitchApiBundle\Lib\Client');
        $factory = new MeFactory();
        $transformer = new JsonTransformer();
        $repository = new MeRepository($client->reveal(), $factory, $transformer);

        $this->assertEquals(MeRepository::ENDPOINT, constant(get_class($repository).'::ENDPOINT'));

        $response = $this->prophet->prophesize('GuzzleHttp\Psr7\Response');
        $client->get(MeRepository::ENDPOINT, ["Authorization" => "OAuth some_token"])->willReturn($response->reveal());

        $body = $this->prophet->prophesize();
        $body->willImplement('Psr\Http\Message\StreamInterface');
        $response->getBody()->willReturn($body->reveal());

        $content = '{"type": "user","name": "test_user1","created_at": "2011-06-03T17:49:19Z","updated_at": "2012-06-18T17:19:57Z","_links": {"self": "https://api.twitch.tv/kraken/users/test_user1"},"logo": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_user1-profile_image-62e8318af864d6d7-300x300.jpeg","_id": 22761313,"display_name": "test_user1","email": "asdf@asdf.com","partnered": true,"bio": "test bio woo I\'m a test user","notifications": {"email": true,"push": false}}';
        $body->getContents()->willReturn($content);

        $result = $repository->getMe('some_token');
        $expected = (new MeFactory())->createEntity(json_decode($content, true));

        $this->assertEquals($expected, $result);
    }

    /**
     * Test fail Get authenticated user method.
     * @expectedException InvalidArgumentException
     */
    public function testFailGetMe()
    {
        $client = $this->prophet->prophesize('Shoko\TwitchApiBundle\Lib\Client');
        $factory = new MeFactory();
        $transformer = new JsonTransformer();
        $repository = new MeRepository($client->reveal(), $factory, $transformer);

        $this->assertEquals(MeRepository::ENDPOINT, constant(get_class($repository).'::ENDPOINT'));

        $response = $this->prophet->prophesize('GuzzleHttp\Psr7\Response');

        $body = $this->prophet->prophesize();
        $body->willImplement('Psr\Http\Message\StreamInterface');
        $response->getBody()->willReturn($body->reveal());

        $content = '{"type": "user","name": "test_user1","created_at": "2011-06-03T17:49:19Z","updated_at": "2012-06-18T17:19:57Z","_links": {"self": "https://api.twitch.tv/kraken/users/test_user1"},"logo": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_user1-profile_image-62e8318af864d6d7-300x300.jpeg","_id": 22761313,"display_name": "test_user1","email": "asdf@asdf.com","partnered": true,"bio": "test bio woo I\'m a test user","notifications": {"email": true,"push": false}}';
        $body->getContents()->willReturn($content);

        $result = $repository->getMe('');
        $expected = (new MeFactory())->createEntity(json_decode($content, true));

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
