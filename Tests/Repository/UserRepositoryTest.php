<?php

namespace Shoko\TwitchApiBundle\Tests\Lib;

use Shoko\TwitchApiBundle\Repository\UserRepository;
use Shoko\TwitchApiBundle\Factory\UserFactory;
use Shoko\TwitchApiBundle\Factory\FollowFactory;
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

        $this->assertEquals(UserRepository::ENDPOINT, constant(get_class($repository).'::ENDPOINT'));

        $response = $this->prophet->prophesize('GuzzleHttp\Psr7\Response');
        $client->get(UserRepository::ENDPOINT.'some_user')->willReturn($response->reveal());

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
     * Test Get user followed games method.
     */
    public function testGetUserFollowedGames()
    {
        $client = $this->prophet->prophesize('Shoko\TwitchApiBundle\Lib\Client');
        $factory = new UserFactory();
        $transformer = new JsonTransformer();
        $repository = new UserRepository($client->reveal(), $factory, $transformer);

        $response = $this->prophet->prophesize('GuzzleHttp\Psr7\Response');
        $client->setUrl('https://api.twitch.tv/api/')->willReturn($client->reveal());
        $client->get(UserRepository::ENDPOINT.'some_user/follows/games')->willReturn($response->reveal());

        $body = $this->prophet->prophesize();
        $body->willImplement('Psr\Http\Message\StreamInterface');
        $response->getBody()->willReturn($body->reveal());

        $content = '{"_total":264,"follows":[{"name":"Age of Empires II: HD Edition","_id":404776,"giantbomb_id":0,"box":{"large":"http://static-cdn.jtvnw.net/ttv-boxart/Age%20of%20Empires%20II:%20HD%20Edition-272x380.jpg","medium":"http://static-cdn.jtvnw.net/ttv-boxart/Age%20of%20Empires%20II:%20HD%20Edition-136x190.jpg","small":"http://static-cdn.jtvnw.net/ttv-boxart/Age%20of%20Empires%20II:%20HD%20Edition-52x72.jpg","template":"http://static-cdn.jtvnw.net/ttv-boxart/Age%20of%20Empires%20II:%20HD%20Edition-{width}x{height}.jpg"},"logo":{"large":"http://static-cdn.jtvnw.net/ttv-logoart/Age%20of%20Empires%20II:%20HD%20Edition-240x144.jpg","medium":"http://static-cdn.jtvnw.net/ttv-logoart/Age%20of%20Empires%20II:%20HD%20Edition-120x72.jpg","small":"http://static-cdn.jtvnw.net/ttv-logoart/Age%20of%20Empires%20II:%20HD%20Edition-60x36.jpg","template":"http://static-cdn.jtvnw.net/ttv-logoart/Age%20of%20Empires%20II:%20HD%20Edition-{width}x{height}.jpg"},"properties":{},"_links":{}}]}';
        $body->getContents()->willReturn($content);

        $result = $repository->getUserFollowedGames('some_user');
        $expected = (new FollowFactory())->createGameList(json_decode($content, true));

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
