<?php

namespace Shoko\TwitchApiBundle\Tests\Factory;

use Shoko\TwitchApiBundle\Factory\FeaturedFactory;
use Shoko\TwitchApiBundle\Model\Entity\Featured;
use Shoko\TwitchApiBundle\Util\JsonTransformer;

/**
 * FeaturedFactoryTest class.
 */
class FeaturedFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test create featured method.
     */
    public function testCreateEntity()
    {
        $json = '{"_links": {"self": "https://api.twitch.tv/kraken/streams/featured?limit=25&offset=0","next": "https://api.twitch.tv/kraken/streams/featured?limit=25&offset=25"},"featured": [{"image": "http://s.jtvnw.net/jtv_user_pictures/hosted_images/TwitchPartnerSpotlight.png","text": "<p>some html to describe this featured stream</p>","title": "Twitch Partner Spotlight","sponsored": false,"scheduled": true,"stream": {"game": "StarCraft II: Heart of the Swarm","viewers": 2123,"average_fps": 29.9880749574,"delay": 0,"video_height": 720,"created_at": "2015-02-12T04:42:31Z","_id": 4989654544,"channel": {"mature": false,"status": "test status","broadcaster_language": "en","display_name": "test_channel","game": "StarCraft II: Heart of the Swarm","delay": null,"language": "en","_id": 12345,"name": "test_channel","created_at": "2007-05-22T10:39:54Z","updated_at": "2015-02-12T04:15:49Z","logo": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-profile_image-94a42b3a13c31c02-300x300.jpeg","banner": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-channel_header_image-08dd874c17f39837-640x125.png","video_banner": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-channel_offline_image-b314c834d210dc1a-640x360.png","background": null,"profile_banner": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-profile_banner-6936c61353e4aeed-480.png","profile_banner_background_color": "null","partner": true,"url": "http://www.twitch.tv/test_channel","views": 49144894,"followers": 215780,"_links": {"self": "https://api.twitch.tv/kraken/channels/test_channel","follows": "https://api.twitch.tv/kraken/channels/test_channel/follows","commercial": "https://api.twitch.tv/kraken/channels/test_channel/commercial","stream_key": "https://api.twitch.tv/kraken/channels/test_channel/stream_key","chat": "https://api.twitch.tv/kraken/chat/test_channel","features": "https://api.twitch.tv/kraken/channels/test_channel/features","subscriptions": "https://api.twitch.tv/kraken/channels/test_channel/subscriptions","editors": "https://api.twitch.tv/kraken/channels/test_channel/editors","teams": "https://api.twitch.tv/kraken/channels/test_channel/teams","videos": "https://api.twitch.tv/kraken/channels/test_channel/videos"}},"preview": {"small": "http://static-cdn.jtvnw.net/previews-ttv/live_user_test_channel-80x45.jpg","medium": "http://static-cdn.jtvnw.net/previews-ttv/live_user_test_channel-320x180.jpg","large": "http://static-cdn.jtvnw.net/previews-ttv/live_user_test_channel-640x360.jpg","template": "http://static-cdn.jtvnw.net/previews-ttv/live_user_test_channel-{width}x{height}.jpg"},"_links": {"self": "https://api.twitch.tv/kraken/streams/test_channel"}}}]}';
        $data = (new JsonTransformer())->transform($json);

        $featuredStreamFactory = new FeaturedFactory();
        $featuredStream = $featuredStreamFactory->createEntity($data);

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Featured', $featuredStream);
        $this->assertArrayHasKey('self', $featuredStream->getLinks());
    }

    /**
     * Test create featured streams method.
     */
    public function testCreateFeaturedStreams()
    {
        $json = '{"_links": {"self": "https://api.twitch.tv/kraken/streams/featured?limit=25&offset=0","next": "https://api.twitch.tv/kraken/streams/featured?limit=25&offset=25"},"featured": [{"image": "http://s.jtvnw.net/jtv_user_pictures/hosted_images/TwitchPartnerSpotlight.png","text": "<p>some html to describe this featured stream</p>","title": "Twitch Partner Spotlight","sponsored": false,"scheduled": true,"stream": {"game": "StarCraft II: Heart of the Swarm","viewers": 2123,"average_fps": 29.9880749574,"delay": 0,"video_height": 720,"created_at": "2015-02-12T04:42:31Z","_id": 4989654544,"channel": {"mature": false,"status": "test status","broadcaster_language": "en","display_name": "test_channel","game": "StarCraft II: Heart of the Swarm","delay": null,"language": "en","_id": 12345,"name": "test_channel","created_at": "2007-05-22T10:39:54Z","updated_at": "2015-02-12T04:15:49Z","logo": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-profile_image-94a42b3a13c31c02-300x300.jpeg","banner": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-channel_header_image-08dd874c17f39837-640x125.png","video_banner": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-channel_offline_image-b314c834d210dc1a-640x360.png","background": null,"profile_banner": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-profile_banner-6936c61353e4aeed-480.png","profile_banner_background_color": "null","partner": true,"url": "http://www.twitch.tv/test_channel","views": 49144894,"followers": 215780,"_links": {"self": "https://api.twitch.tv/kraken/channels/test_channel","follows": "https://api.twitch.tv/kraken/channels/test_channel/follows","commercial": "https://api.twitch.tv/kraken/channels/test_channel/commercial","stream_key": "https://api.twitch.tv/kraken/channels/test_channel/stream_key","chat": "https://api.twitch.tv/kraken/chat/test_channel","features": "https://api.twitch.tv/kraken/channels/test_channel/features","subscriptions": "https://api.twitch.tv/kraken/channels/test_channel/subscriptions","editors": "https://api.twitch.tv/kraken/channels/test_channel/editors","teams": "https://api.twitch.tv/kraken/channels/test_channel/teams","videos": "https://api.twitch.tv/kraken/channels/test_channel/videos"}},"preview": {"small": "http://static-cdn.jtvnw.net/previews-ttv/live_user_test_channel-80x45.jpg","medium": "http://static-cdn.jtvnw.net/previews-ttv/live_user_test_channel-320x180.jpg","large": "http://static-cdn.jtvnw.net/previews-ttv/live_user_test_channel-640x360.jpg","template": "http://static-cdn.jtvnw.net/previews-ttv/live_user_test_channel-{width}x{height}.jpg"},"_links": {"self": "https://api.twitch.tv/kraken/streams/test_channel"}}}]}';
        $data = (new JsonTransformer())->transform($json);

        $featuredStreamFactory = new FeaturedFactory();
        $featuredStreams = $featuredStreamFactory->createFeaturedStreams($data['featured']);

        $this->assertEquals(1, count($featuredStreams));
        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\FeaturedStream', $featuredStreams[0]);
        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Stream', $featuredStreams[0]->getStream());
        $this->assertEquals(2123, $featuredStreams[0]->getStream()->getViewers());
    }
}
