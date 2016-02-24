<?php

namespace Shoko\TwitchApiBundle\Tests\Factory;

use Shoko\TwitchApiBundle\Factory\StreamFactory;
use Shoko\TwitchApiBundle\Model\Entity\Stream;

/**
 * StreamFactoryTest class.
 */
class StreamFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test create stream method.
     */
    public function testCreateStream()
    {
        $json = '{"_links": {"channel": "https://api.twitch.tv/kraken/channels/test_channel","self": "https://api.twitch.tv/kraken/streams/test_channel"},"stream": {"game": "StarCraft II: Heart of the Swarm","viewers": 2123,"average_fps": 29.9880749574,"delay": 0,"video_height": 720,"is_playlist": false,"created_at": "2015-02-12T04:42:31Z","_id": 4989654544,"channel": {"mature": false,"status": "test status","broadcaster_language": "en","display_name": "test_channel","game": "StarCraft II: Heart of the Swarm","delay": null,"language": "en","_id": 12345,"name": "test_channel","created_at": "2007-05-22T10:39:54Z","updated_at": "2015-02-12T04:15:49Z","logo": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-profile_image-94a42b3a13c31c02-300x300.jpeg","banner": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-channel_header_image-08dd874c17f39837-640x125.png","video_banner": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-channel_offline_image-b314c834d210dc1a-640x360.png","background": null,"profile_banner": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-profile_banner-6936c61353e4aeed-480.png","profile_banner_background_color": "null","partner": true,"url": "http://www.twitch.tv/test_channel","views": 49144894,"followers": 215780,"_links": {"self": "https://api.twitch.tv/kraken/channels/test_channel","follows": "https://api.twitch.tv/kraken/channels/test_channel/follows","commercial": "https://api.twitch.tv/kraken/channels/test_channel/commercial","stream_key": "https://api.twitch.tv/kraken/channels/test_channel/stream_key","chat": "https://api.twitch.tv/kraken/chat/test_channel","features": "https://api.twitch.tv/kraken/channels/test_channel/features","subscriptions": "https://api.twitch.tv/kraken/channels/test_channel/subscriptions","editors": "https://api.twitch.tv/kraken/channels/test_channel/editors","teams": "https://api.twitch.tv/kraken/channels/test_channel/teams","videos": "https://api.twitch.tv/kraken/channels/test_channel/videos"}},"preview": {"small": "http://static-cdn.jtvnw.net/previews-ttv/live_user_test_channel-80x45.jpg","medium": "http://static-cdn.jtvnw.net/previews-ttv/live_user_test_channel-320x180.jpg","large": "http://static-cdn.jtvnw.net/previews-ttv/live_user_test_channel-640x360.jpg","template": "http://static-cdn.jtvnw.net/previews-ttv/live_user_test_channel-{width}x{height}.jpg"},"_links": {"self": "https://api.twitch.tv/kraken/streams/test_channel"}}}';
        $data = json_decode($json, true);

        $streamFactory = new StreamFactory();
        $stream = $streamFactory->createEntity($data['stream']);

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Stream', $stream);
        $this->assertEquals(new \DateTime('2015-02-12T04:42:31Z'), $stream->getCreatedAt());
        $this->assertArrayHasKey('self', $stream->getLinks());
        $this->assertEquals('https://api.twitch.tv/kraken/streams/test_channel', $stream->getLinks()['self']);
        $this->assertEquals(4989654544, $stream->getId());
        $this->assertEquals(false, $stream->isPlaylist());
        $this->assertEquals('StarCraft II: Heart of the Swarm', $stream->getGame());
        $this->assertEquals(0, $stream->getDelay());
        $this->assertEquals(2123, $stream->getViewers());
        $this->assertEquals(29.9880749574, $stream->getAverageFps());
        $this->assertEquals(720, $stream->getVideoHeight());
        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Channel', $stream->getChannel());
    }

    /**
     * Test create streamList method.
     */
    public function testCreateStreamList()
    {
        $json = '{"_total": 12345,"streams": [{"game": "StarCraft II: Heart of the Swarm","viewers": 2123,"average_fps": 29.9880749574,"delay": 0,"video_height": 720,"is_playlist": false,"created_at": "2015-02-12T04:42:31Z","_id": 4989654544,"channel": {"mature": false,"status": "test status","broadcaster_language": "en","display_name": "test_channel","game": "StarCraft II: Heart of the Swarm","delay": null,"language": "en","_id": 12345,"name": "test_channel","created_at": "2007-05-22T10:39:54Z","updated_at": "2015-02-12T04:15:49Z","logo": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-profile_image-94a42b3a13c31c02-300x300.jpeg","banner": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-channel_header_image-08dd874c17f39837-640x125.png","video_banner": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-channel_offline_image-b314c834d210dc1a-640x360.png","background": null,"profile_banner": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-profile_banner-6936c61353e4aeed-480.png","profile_banner_background_color": "null","partner": true,"url": "http://www.twitch.tv/test_channel","views": 49144894,"followers": 215780,"_links": {"self": "https://api.twitch.tv/kraken/channels/test_channel","follows": "https://api.twitch.tv/kraken/channels/test_channel/follows","commercial": "https://api.twitch.tv/kraken/channels/test_channel/commercial","stream_key": "https://api.twitch.tv/kraken/channels/test_channel/stream_key","chat": "https://api.twitch.tv/kraken/chat/test_channel","features": "https://api.twitch.tv/kraken/channels/test_channel/features","subscriptions": "https://api.twitch.tv/kraken/channels/test_channel/subscriptions","editors": "https://api.twitch.tv/kraken/channels/test_channel/editors","teams": "https://api.twitch.tv/kraken/channels/test_channel/teams","videos": "https://api.twitch.tv/kraken/channels/test_channel/videos"}},"preview": {"small": "http://static-cdn.jtvnw.net/previews-ttv/live_user_test_channel-80x45.jpg","medium": "http://static-cdn.jtvnw.net/previews-ttv/live_user_test_channel-320x180.jpg","large": "http://static-cdn.jtvnw.net/previews-ttv/live_user_test_channel-640x360.jpg","template": "http://static-cdn.jtvnw.net/previews-ttv/live_user_test_channel-{width}x{height}.jpg"},"_links": {"self": "https://api.twitch.tv/kraken/streams/test_channel"}}],"_links": {"summary": "https://api.twitch.tv/kraken/streams/summary","followed": "https://api.twitch.tv/kraken/streams/followed","next": "https://api.twitch.tv/kraken/streams?channel=test_channel%2Ctest_channel2&game=StarCraft+II%3A+Heart+of+the+Swarm&limit=100&offset=100","featured": "https://api.twitch.tv/kraken/streams/featured","self": "https://api.twitch.tv/kraken/streams?channel=test_channel%2Ctest_channel2&game=StarCraft+II%3A+Heart+of+the+Swarm&limit=100&offset=0"}}';
        $data = json_decode($json, true);

        $streamFactory = new StreamFactory();
        $streamList = $streamFactory->createList($data);

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\StreamList', $streamList);
        $this->assertArrayHasKey('self', $streamList->getLinks());
        $this->assertEquals('https://api.twitch.tv/kraken/streams?channel=test_channel%2Ctest_channel2&game=StarCraft+II%3A+Heart+of+the+Swarm&limit=100&offset=0', $streamList->getLinks()['self']);
        $this->assertEquals(12345, $streamList->getTotal());
    }

    /**
     * Test create streams method.
     */
    public function testCreateStreams()
    {
        $json = '{"_total": 12345,"streams": [{"game": "StarCraft II: Heart of the Swarm","viewers": 2123,"average_fps": 29.9880749574,"delay": 0,"video_height": 720,"is_playlist": false,"created_at": "2015-02-12T04:42:31Z","_id": 4989654544,"channel": {"mature": false,"status": "test status","broadcaster_language": "en","display_name": "test_channel","game": "StarCraft II: Heart of the Swarm","delay": null,"language": "en","_id": 12345,"name": "test_channel","created_at": "2007-05-22T10:39:54Z","updated_at": "2015-02-12T04:15:49Z","logo": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-profile_image-94a42b3a13c31c02-300x300.jpeg","banner": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-channel_header_image-08dd874c17f39837-640x125.png","video_banner": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-channel_offline_image-b314c834d210dc1a-640x360.png","background": null,"profile_banner": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-profile_banner-6936c61353e4aeed-480.png","profile_banner_background_color": "null","partner": true,"url": "http://www.twitch.tv/test_channel","views": 49144894,"followers": 215780,"_links": {"self": "https://api.twitch.tv/kraken/channels/test_channel","follows": "https://api.twitch.tv/kraken/channels/test_channel/follows","commercial": "https://api.twitch.tv/kraken/channels/test_channel/commercial","stream_key": "https://api.twitch.tv/kraken/channels/test_channel/stream_key","chat": "https://api.twitch.tv/kraken/chat/test_channel","features": "https://api.twitch.tv/kraken/channels/test_channel/features","subscriptions": "https://api.twitch.tv/kraken/channels/test_channel/subscriptions","editors": "https://api.twitch.tv/kraken/channels/test_channel/editors","teams": "https://api.twitch.tv/kraken/channels/test_channel/teams","videos": "https://api.twitch.tv/kraken/channels/test_channel/videos"}},"preview": {"small": "http://static-cdn.jtvnw.net/previews-ttv/live_user_test_channel-80x45.jpg","medium": "http://static-cdn.jtvnw.net/previews-ttv/live_user_test_channel-320x180.jpg","large": "http://static-cdn.jtvnw.net/previews-ttv/live_user_test_channel-640x360.jpg","template": "http://static-cdn.jtvnw.net/previews-ttv/live_user_test_channel-{width}x{height}.jpg"},"_links": {"self": "https://api.twitch.tv/kraken/streams/test_channel"}}],"_links": {"summary": "https://api.twitch.tv/kraken/streams/summary","followed": "https://api.twitch.tv/kraken/streams/followed","next": "https://api.twitch.tv/kraken/streams?channel=test_channel%2Ctest_channel2&game=StarCraft+II%3A+Heart+of+the+Swarm&limit=100&offset=100","featured": "https://api.twitch.tv/kraken/streams/featured","self": "https://api.twitch.tv/kraken/streams?channel=test_channel%2Ctest_channel2&game=StarCraft+II%3A+Heart+of+the+Swarm&limit=100&offset=0"}}';
        $data = json_decode($json, true);

        $streamFactory = new StreamFactory();
        $streamList = $streamFactory->createStreams($data['streams']);

        $this->assertEquals(1, count($streamList));
        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Stream', $streamList[0]);
        $this->assertEquals(false, $streamList[0]->isPlaylist());
        $this->assertEquals('StarCraft II: Heart of the Swarm', $streamList[0]->getGame());
    }
}
