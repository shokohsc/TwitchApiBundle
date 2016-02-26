<?php

namespace Shoko\TwitchApiBundle\Tests\Lib;

use Shoko\TwitchApiBundle\Repository\SearchRepository;
use Shoko\TwitchApiBundle\Factory\ChannelFactory;
use Shoko\TwitchApiBundle\Factory\GameFactory;
use Shoko\TwitchApiBundle\Factory\StreamFactory;
use Shoko\TwitchApiBundle\Util\JsonTransformer;
use Prophecy\Prophet;

/**
 * SearchRepositoryTest class.
 */
class SearchRepositoryTest extends \PHPUnit_Framework_TestCase
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
     * Test Get streams method.
     */
    public function testGetChannels()
    {
        $client = $this->prophet->prophesize('Shoko\TwitchApiBundle\Lib\Client');
        $factory = new GameFactory();
        $transformer = new JsonTransformer();
        $repository = new SearchRepository($client->reveal(), $factory, $transformer);

        $this->assertEquals(SearchRepository::ENDPOINT, constant(get_class($repository).'::ENDPOINT'));

        $response = $this->prophet->prophesize('GuzzleHttp\Psr7\Response');
        $client->get(SearchRepository::ENDPOINT.'channels')->willReturn($response->reveal());

        $body = $this->prophet->prophesize();
        $body->willImplement('Psr\Http\Message\StreamInterface');
        $response->getBody()->willReturn($body->reveal());

        $content = '{"channels": [{"mature": false,"status": "test status","broadcaster_language": "en","display_name": "test_channel","game": "StarCraft II: Heart of the Swarm","delay": 0,"language": "en","_id": 12345,"name": "test_channel","created_at": "2007-05-22T10:39:54Z","updated_at": "2015-02-12T04:15:49Z","logo": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-profile_image-94a42b3a13c31c02-300x300.jpeg","banner": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-channel_header_image-08dd874c17f39837-640x125.png","video_banner": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-channel_offline_image-b314c834d210dc1a-640x360.png","background": null,"profile_banner": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-profile_banner-6936c61353e4aeed-480.png","profile_banner_background_color": "null","partner": true,"url": "http://www.twitch.tv/test_channel","views": 49144894,"followers": 215780,"_links": {"self": "https://api.twitch.tv/kraken/channels/test_channel","follows": "https://api.twitch.tv/kraken/channels/test_channel/follows","commercial": "https://api.twitch.tv/kraken/channels/test_channel/commercial","stream_key": "https://api.twitch.tv/kraken/channels/test_channel/stream_key","chat": "https://api.twitch.tv/kraken/chat/test_channel","features": "https://api.twitch.tv/kraken/channels/test_channel/features","subscriptions": "https://api.twitch.tv/kraken/channels/test_channel/subscriptions","editors": "https://api.twitch.tv/kraken/channels/test_channel/editors","teams": "https://api.twitch.tv/kraken/channels/test_channel/teams","videos": "https://api.twitch.tv/kraken/channels/test_channel/videos"}}], "_total": 42679, "_links": {"self": "https://api.twitch.tv/kraken/search/channels?limit=10&offset=0&q=starcraft", "next": "https://api.twitch.tv/kraken/search/channels?limit=10&offset=10&q=starcraft"}}';
        $body->getContents()->willReturn($content);

        $result = $repository->getChannels();
        $expected = (new ChannelFactory())->createList($transformer->transform($content));

        $this->assertEquals($expected, $result);
    }

    /**
     * Test Get games method.
     */
    public function testGetGames()
    {
        $client = $this->prophet->prophesize('Shoko\TwitchApiBundle\Lib\Client');
        $factory = new GameFactory();
        $transformer = new JsonTransformer();
        $repository = new SearchRepository($client->reveal(), $factory, $transformer);

        $this->assertEquals(SearchRepository::ENDPOINT, constant(get_class($repository).'::ENDPOINT'));

        $response = $this->prophet->prophesize('GuzzleHttp\Psr7\Response');
        $client->get(SearchRepository::ENDPOINT.'games')->willReturn($response->reveal());

        $body = $this->prophet->prophesize();
        $body->willImplement('Psr\Http\Message\StreamInterface');
        $response->getBody()->willReturn($body->reveal());

        $content = '{"_links": {"self": "https://api.twitch.tv/kraken/search/games?q=star&type=suggest"},"games": [{"box": {"large": "http://static-cdn.jtvnw.net/ttv-boxart/StarCraft%20II:%20Wings%20of%20Liberty-272x380.jpg","medium": "http://static-cdn.jtvnw.net/ttv-boxart/StarCraft%20II:%20Wings%20of%20Liberty-136x190.jpg","small": "http://static-cdn.jtvnw.net/ttv-boxart/StarCraft%20II:%20Wings%20of%20Liberty-52x72.jpg","template": "http://static-cdn.jtvnw.net/ttv-boxart/StarCraft%20II:%20Wings%20of%20Liberty-{width}x{height}.jpg"},"logo": {"large": "http://static-cdn.jtvnw.net/ttv-logoart/StarCraft%20II:%20Wings%20of%20Liberty-240x144.jpg","medium": "http://static-cdn.jtvnw.net/ttv-logoart/StarCraft%20II:%20Wings%20of%20Liberty-120x72.jpg","small": "http://static-cdn.jtvnw.net/ttv-logoart/StarCraft%20II:%20Wings%20of%20Liberty-60x36.jpg","template": "http://static-cdn.jtvnw.net/ttv-logoart/StarCraft%20II:%20Wings%20of%20Liberty-{width}x{height}.jpg"},"popularity": 114,"name": "StarCraft II: Wings of Liberty","_id": 63011880,"_links": { },"giantbomb_id": 20674}]}';
        $body->getContents()->willReturn($content);

        $result = $repository->getGames();
        $expected = (new GameFactory())->createList($transformer->transform($content));

        $this->assertEquals($expected, $result);
    }

    /**
     * Test Get streams method.
     */
    public function testGetStreams()
    {
        $client = $this->prophet->prophesize('Shoko\TwitchApiBundle\Lib\Client');
        $factory = new GameFactory();
        $transformer = new JsonTransformer();
        $repository = new SearchRepository($client->reveal(), $factory, $transformer);

        $this->assertEquals(SearchRepository::ENDPOINT, constant(get_class($repository).'::ENDPOINT'));

        $response = $this->prophet->prophesize('GuzzleHttp\Psr7\Response');
        $client->get(SearchRepository::ENDPOINT.'streams')->willReturn($response->reveal());

        $body = $this->prophet->prophesize();
        $body->willImplement('Psr\Http\Message\StreamInterface');
        $response->getBody()->willReturn($body->reveal());

        $content = '{"_total": 76,"_links": {"self": "https://api.twitch.tv/kraken/search/streams?limit=25&offset=0&q=starcraft","next": "https://api.twitch.tv/kraken/search/streams?limit=25&offset=25&q=starcraft"},"streams": [{"game": "StarCraft II: Heart of the Swarm","viewers": 2123,"created_at": "2015-02-12T04:42:31Z","_id": 4989654544,"channel": {"mature": false,"status": "test status","broadcaster_language": "en","display_name": "test_channel","game": "StarCraft II: Heart of the Swarm","delay": 0,"language": "en","_id": 12345,"name": "test_channel","created_at": "2007-05-22T10:39:54Z","updated_at": "2015-02-12T04:15:49Z","logo": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-profile_image-94a42b3a13c31c02-300x300.jpeg","banner": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-channel_header_image-08dd874c17f39837-640x125.png","video_banner": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-channel_offline_image-b314c834d210dc1a-640x360.png","background": null,"profile_banner": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-profile_banner-6936c61353e4aeed-480.png","profile_banner_background_color": "null","partner": true,"url": "http://www.twitch.tv/test_channel","views": 49144894,"followers": 215780,"_links": {"self": "https://api.twitch.tv/kraken/channels/test_channel","follows": "https://api.twitch.tv/kraken/channels/test_channel/follows","commercial": "https://api.twitch.tv/kraken/channels/test_channel/commercial","stream_key": "https://api.twitch.tv/kraken/channels/test_channel/stream_key","chat": "https://api.twitch.tv/kraken/chat/test_channel","features": "https://api.twitch.tv/kraken/channels/test_channel/features","subscriptions": "https://api.twitch.tv/kraken/channels/test_channel/subscriptions","editors": "https://api.twitch.tv/kraken/channels/test_channel/editors","teams": "https://api.twitch.tv/kraken/channels/test_channel/teams","videos": "https://api.twitch.tv/kraken/channels/test_channel/videos"}},"preview": {"small": "http://static-cdn.jtvnw.net/previews-ttv/live_user_test_channel-80x45.jpg","medium": "http://static-cdn.jtvnw.net/previews-ttv/live_user_test_channel-320x180.jpg","large": "http://static-cdn.jtvnw.net/previews-ttv/live_user_test_channel-640x360.jpg","template": "http://static-cdn.jtvnw.net/previews-ttv/live_user_test_channel-{width}x{height}.jpg"},"_links": {"self": "https://api.twitch.tv/kraken/streams/test_channel"}}]}';
        $body->getContents()->willReturn($content);

        $result = $repository->getStreams();
        $expected = (new StreamFactory())->createList($transformer->transform($content));

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
