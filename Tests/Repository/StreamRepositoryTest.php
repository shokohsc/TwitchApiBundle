<?php

namespace Shoko\TwitchApiBundle\Tests\Lib;

use Shoko\TwitchApiBundle\Repository\StreamRepository;
use Shoko\TwitchApiBundle\Factory\RankFactory;
use Shoko\TwitchApiBundle\Factory\StreamFactory;
use Shoko\TwitchApiBundle\Model\Entity\Stream;
use Shoko\TwitchApiBundle\Util\JsonTransformer;
use Prophecy\Prophet;

/**
 * StreamRepositoryTest class.
 */
class StreamRepositoryTest extends \PHPUnit_Framework_TestCase
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
     * Test Get stream method.
     */
    public function testGetStream()
    {
        $client = $this->prophet->prophesize('Shoko\TwitchApiBundle\Lib\Client');
        $factory = new StreamFactory();
        $transformer = new JsonTransformer();
        $repository = new StreamRepository($client->reveal(), $factory, $transformer);

        $this->assertEquals(StreamRepository::ENDPOINT, constant(get_class($repository).'::ENDPOINT'));

        $response = $this->prophet->prophesize('GuzzleHttp\Psr7\Response');
        $client->get(StreamRepository::ENDPOINT.'some_stream')->willReturn($response->reveal());

        $body = $this->prophet->prophesize();
        $body->willImplement('Psr\Http\Message\StreamInterface');
        $response->getBody()->willReturn($body->reveal());

        $content = '{"stream":null,"_links":{"self":"https://api.twitch.tv/kraken/streams/test_channel","channel":"https://api.twitch.tv/kraken/channels/test_channel"}}';
        $body->getContents()->willReturn($content);

        $result = $repository->getStream('some_stream');
        $expected = (new StreamFactory())->createEntity([]);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test Get streams method.
     */
    public function testGetStreams()
    {
        $client = $this->prophet->prophesize('Shoko\TwitchApiBundle\Lib\Client');
        $factory = new StreamFactory();
        $transformer = new JsonTransformer();
        $repository = new StreamRepository($client->reveal(), $factory, $transformer);

        $response = $this->prophet->prophesize('GuzzleHttp\Psr7\Response');
        $client->get(StreamRepository::ENDPOINT)->willReturn($response->reveal());

        $body = $this->prophet->prophesize();
        $body->willImplement('Psr\Http\Message\StreamInterface');
        $response->getBody()->willReturn($body->reveal());

        $content = '{"streams":[],"_total":0,"_links":{"self":"https://api.twitch.tv/kraken/streams?channel=test_channel%2Ctest_channel2\u0026game=StarCraft+II%3A+Heart+of+the+Swarm\u0026limit=1\u0026offset=0","next":"https://api.twitch.tv/kraken/streams?channel=test_channel%2Ctest_channel2\u0026game=StarCraft+II%3A+Heart+of+the+Swarm\u0026limit=1\u0026offset=1","featured":"https://api.twitch.tv/kraken/streams/featured","summary":"https://api.twitch.tv/kraken/streams/summary","followed":"https://api.twitch.tv/kraken/streams/followed"}}';
        $body->getContents()->willReturn($content);

        $result = $repository->getStreams();
        $expected = (new StreamFactory())->createList(json_decode($content, true));

        $this->assertEquals($expected, $result);
    }

    /**
     * Test Get featured streams method.
     */
    public function testGetFeaturedStreams()
    {
        $client = $this->prophet->prophesize('Shoko\TwitchApiBundle\Lib\Client');
        $factory = new StreamFactory();
        $transformer = new JsonTransformer();
        $repository = new StreamRepository($client->reveal(), $factory, $transformer);

        $response = $this->prophet->prophesize('GuzzleHttp\Psr7\Response');
        $client->get(StreamRepository::ENDPOINT.'featured')->willReturn($response->reveal());

        $body = $this->prophet->prophesize();
        $body->willImplement('Psr\Http\Message\StreamInterface');
        $response->getBody()->willReturn($body->reveal());

        $content = '{"_links": {"self": "https://api.twitch.tv/kraken/streams/featured?limit=25&offset=0","next": "https://api.twitch.tv/kraken/streams/featured?limit=25&offset=25"},"featured": [{"image": "http://s.jtvnw.net/jtv_user_pictures/hosted_images/TwitchPartnerSpotlight.png","text": "<p>some html to describe this featured stream</p>","title": "Twitch Partner Spotlight","sponsored": false,"scheduled": true,"stream": {"game": "StarCraft II: Heart of the Swarm","viewers": 2123,"average_fps": 29.9880749574,"delay": 0,"video_height": 720,"created_at": "2015-02-12T04:42:31Z","_id": 4989654544,"channel": {"mature": false,"status": "test status","broadcaster_language": "en","display_name": "test_channel","game": "StarCraft II: Heart of the Swarm","delay": null,"language": "en","_id": 12345,"name": "test_channel","created_at": "2007-05-22T10:39:54Z","updated_at": "2015-02-12T04:15:49Z","logo": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-profile_image-94a42b3a13c31c02-300x300.jpeg","banner": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-channel_header_image-08dd874c17f39837-640x125.png","video_banner": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-channel_offline_image-b314c834d210dc1a-640x360.png","background": null,"profile_banner": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-profile_banner-6936c61353e4aeed-480.png","profile_banner_background_color": "null","partner": true,"url": "http://www.twitch.tv/test_channel","views": 49144894,"followers": 215780,"_links": {"self": "https://api.twitch.tv/kraken/channels/test_channel","follows": "https://api.twitch.tv/kraken/channels/test_channel/follows","commercial": "https://api.twitch.tv/kraken/channels/test_channel/commercial","stream_key": "https://api.twitch.tv/kraken/channels/test_channel/stream_key","chat": "https://api.twitch.tv/kraken/chat/test_channel","features": "https://api.twitch.tv/kraken/channels/test_channel/features","subscriptions": "https://api.twitch.tv/kraken/channels/test_channel/subscriptions","editors": "https://api.twitch.tv/kraken/channels/test_channel/editors","teams": "https://api.twitch.tv/kraken/channels/test_channel/teams","videos": "https://api.twitch.tv/kraken/channels/test_channel/videos"}},"preview": {"small": "http://static-cdn.jtvnw.net/previews-ttv/live_user_test_channel-80x45.jpg","medium": "http://static-cdn.jtvnw.net/previews-ttv/live_user_test_channel-320x180.jpg","large": "http://static-cdn.jtvnw.net/previews-ttv/live_user_test_channel-640x360.jpg","template": "http://static-cdn.jtvnw.net/previews-ttv/live_user_test_channel-{width}x{height}.jpg"},"_links": {"self": "https://api.twitch.tv/kraken/streams/test_channel"}}}]}';
        $body->getContents()->willReturn($content);

        $result = $repository->getFeaturedStreams();
        $expected = (new StreamFactory())->createFeatured(json_decode($content, true));

        $this->assertEquals($expected, $result);
    }

    /**
     * Test Get followed streams method.
     */
    public function testGetFollowedStreams()
    {
        $client = $this->prophet->prophesize('Shoko\TwitchApiBundle\Lib\Client');
        $factory = new StreamFactory();
        $transformer = new JsonTransformer();
        $repository = new StreamRepository($client->reveal(), $factory, $transformer);

        $response = $this->prophet->prophesize('GuzzleHttp\Psr7\Response');
        $client->get(StreamRepository::ENDPOINT.'followed', ["Authorization" => "OAuth some_access_token"])->willReturn($response->reveal());

        $body = $this->prophet->prophesize();
        $body->willImplement('Psr\Http\Message\StreamInterface');
        $response->getBody()->willReturn($body->reveal());

        $content = '{"_links": {"self": "https://api.twitch.tv/kraken/streams/followed?limit=25&offset=0","next": "https://api.twitch.tv/kraken/streams/followed?limit=25&offset=25"},"_total": 123,"streams": []}';
        $body->getContents()->willReturn($content);

        $result = $repository->getFollowedStreams('some_access_token');
        $expected = (new StreamFactory())->createList(json_decode($content, true));

        $this->assertEquals($expected, $result);
    }

    /**
     * Test fail Get followed streams method.
     * @expectedException InvalidArgumentException
     */
    public function testFailGetFollowedStreams()
    {
        $client = $this->prophet->prophesize('Shoko\TwitchApiBundle\Lib\Client');
        $factory = new StreamFactory();
        $transformer = new JsonTransformer();
        $repository = new StreamRepository($client->reveal(), $factory, $transformer);

        $response = $this->prophet->prophesize('GuzzleHttp\Psr7\Response');

        $body = $this->prophet->prophesize();
        $body->willImplement('Psr\Http\Message\StreamInterface');
        $response->getBody()->willReturn($body->reveal());

        $content = '{"_links": {"self": "https://api.twitch.tv/kraken/streams/followed?limit=25&offset=0","next": "https://api.twitch.tv/kraken/streams/followed?limit=25&offset=25"},"_total": 123,"streams": []}';
        $body->getContents()->willReturn($content);

        $result = $repository->getFollowedStreams('');
        $expected = (new StreamFactory())->createList(json_decode($content, true));

        $this->assertEquals($expected, $result);
    }

    /**
     * Test Get streams summary method.
     */
    public function testGetStreamsSummary()
    {
        $client = $this->prophet->prophesize('Shoko\TwitchApiBundle\Lib\Client');
        $factory = new StreamFactory();
        $transformer = new JsonTransformer();
        $repository = new StreamRepository($client->reveal(), $factory, $transformer);

        $response = $this->prophet->prophesize('GuzzleHttp\Psr7\Response');
        $client->get(StreamRepository::ENDPOINT.'summary')->willReturn($response->reveal());

        $body = $this->prophet->prophesize();
        $body->willImplement('Psr\Http\Message\StreamInterface');
        $response->getBody()->willReturn($body->reveal());

        $content = '{"viewers": 194774,"_links": {"self": "https://api.twitch.tv/kraken/streams/summary"},"channels": 4144}';
        $body->getContents()->willReturn($content);

        $result = $repository->getStreamsSummary();
        $expected = (new RankFactory())->createEntity(json_decode($content, true));

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
