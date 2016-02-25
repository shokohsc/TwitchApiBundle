<?php

namespace Shoko\TwitchApiBundle\Tests\Factory;

use Shoko\TwitchApiBundle\Factory\ChannelFactory;
use Shoko\TwitchApiBundle\Model\Entity\Channel;
use Shoko\TwitchApiBundle\Util\JsonTransformer;

/**
 * ChannelFactoryTest class.
 */
class ChannelFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test create channel method.
     */
    public function testCreateChannel()
    {
        $json = '{"mature":false,"status":"TESTING  TESTING   TESTING","broadcaster_language":null,"display_name":"Test_channel","game":null,"language":"en","_id":6140842,"name":"test_channel","created_at":"2009-05-08T08:19:58Z","updated_at":"2016-02-23T01:45:33Z","delay":null,"logo":null,"banner":null,"video_banner":null,"background":null,"profile_banner":null,"profile_banner_background_color":null,"partner":false,"url":"http://www.twitch.tv/test_channel","views":223,"followers":12,"_links":{"self":"https://api.twitch.tv/kraken/channels/test_channel","follows":"https://api.twitch.tv/kraken/channels/test_channel/follows","commercial":"https://api.twitch.tv/kraken/channels/test_channel/commercial","stream_key":"https://api.twitch.tv/kraken/channels/test_channel/stream_key","chat":"https://api.twitch.tv/kraken/chat/test_channel","features":"https://api.twitch.tv/kraken/channels/test_channel/features","subscriptions":"https://api.twitch.tv/kraken/channels/test_channel/subscriptions","editors":"https://api.twitch.tv/kraken/channels/test_channel/editors","teams":"https://api.twitch.tv/kraken/channels/test_channel/teams","videos":"https://api.twitch.tv/kraken/channels/test_channel/videos"}}';
        $data = (new JsonTransformer)->transform($json);

        $channelFactory = new ChannelFactory();
        $channel = $channelFactory->createEntity($data);

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Channel', $channel);
        $this->assertEquals('test_channel', $channel->getName());
        $this->assertEquals(new \DateTime('2009-05-08T08:19:58Z'), $channel->getCreatedAt());
        $this->assertEquals(new \DateTime('2016-02-23T01:45:33Z'), $channel->getUpdatedAt());
        $this->assertArrayHasKey('self', $channel->getLinks());
        $this->assertEquals('https://api.twitch.tv/kraken/channels/test_channel', $channel->getLinks()['self']);
        $this->assertEquals(null, $channel->getLogo());
        $this->assertEquals(6140842, $channel->getId());
        $this->assertEquals('Test_channel', $channel->getDisplayName());
        $this->assertEquals(false, $channel->isMature());
        $this->assertEquals('TESTING  TESTING   TESTING', $channel->getStatus());
        $this->assertEquals(null, $channel->getBroadcasterLanguage());
        $this->assertEquals(null, $channel->getGame());
        $this->assertEquals(null, $channel->getDelay());
        $this->assertEquals('en', $channel->getLanguage());
        $this->assertEquals(null, $channel->getBanner());
        $this->assertEquals(null, $channel->getVideoBanner());
        $this->assertEquals(null, $channel->getBackground());
        $this->assertEquals(null, $channel->getProfileBanner());
        $this->assertEquals(null, $channel->getProfileBannerBackgroundColor());
        $this->assertEquals(false, $channel->isPartner());
        $this->assertEquals('http://www.twitch.tv/test_channel', $channel->getUrl());
        $this->assertEquals(223, $channel->getViews());
        $this->assertEquals(12, $channel->getFollowers());
    }

        /**
         * Test create channelList method.
         */
        public function testCreateChannelList()
        {
            $json = '{"channels": [{"mature": false,"status": "test status","broadcaster_language": "en","display_name": "test_channel","game": "StarCraft II: Heart of the Swarm","delay": 0,"language": "en","_id": 12345,"name": "test_channel","created_at": "2007-05-22T10:39:54Z","updated_at": "2015-02-12T04:15:49Z","logo": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-profile_image-94a42b3a13c31c02-300x300.jpeg","banner": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-channel_header_image-08dd874c17f39837-640x125.png","video_banner": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-channel_offline_image-b314c834d210dc1a-640x360.png","background": null,"profile_banner": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-profile_banner-6936c61353e4aeed-480.png","profile_banner_background_color": "null","partner": true,"url": "http://www.twitch.tv/test_channel","views": 49144894,"followers": 215780,"_links": {"self": "https://api.twitch.tv/kraken/channels/test_channel","follows": "https://api.twitch.tv/kraken/channels/test_channel/follows","commercial": "https://api.twitch.tv/kraken/channels/test_channel/commercial","stream_key": "https://api.twitch.tv/kraken/channels/test_channel/stream_key","chat": "https://api.twitch.tv/kraken/chat/test_channel","features": "https://api.twitch.tv/kraken/channels/test_channel/features","subscriptions": "https://api.twitch.tv/kraken/channels/test_channel/subscriptions","editors": "https://api.twitch.tv/kraken/channels/test_channel/editors","teams": "https://api.twitch.tv/kraken/channels/test_channel/teams","videos": "https://api.twitch.tv/kraken/channels/test_channel/videos"}}],"_total": 42679,"_links": {"self": "https://api.twitch.tv/kraken/search/channels?limit=10&offset=0&q=starcraft","next": "https://api.twitch.tv/kraken/search/channels?limit=10&offset=10&q=starcraft"}}';
            $data = json_decode($json, true);

            $channelFactory = new ChannelFactory();
            $channelList = $channelFactory->createList($data);

            $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\ChannelList', $channelList);
            $this->assertArrayHasKey('self', $channelList->getLinks());
            $this->assertEquals('https://api.twitch.tv/kraken/search/channels?limit=10&offset=0&q=starcraft', $channelList->getLinks()['self']);
            $this->assertEquals(42679, $channelList->getTotal());
        }

        /**
         * Test create streams method.
         */
        public function testCreateChannels()
        {
            $json = '{"channels": [{"mature": false,"status": "test status","broadcaster_language": "en","display_name": "test_channel","game": "StarCraft II: Heart of the Swarm","delay": 0,"language": "en","_id": 12345,"name": "test_channel","created_at": "2007-05-22T10:39:54Z","updated_at": "2015-02-12T04:15:49Z","logo": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-profile_image-94a42b3a13c31c02-300x300.jpeg","banner": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-channel_header_image-08dd874c17f39837-640x125.png","video_banner": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-channel_offline_image-b314c834d210dc1a-640x360.png","background": null,"profile_banner": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_channel-profile_banner-6936c61353e4aeed-480.png","profile_banner_background_color": "null","partner": true,"url": "http://www.twitch.tv/test_channel","views": 49144894,"followers": 215780,"_links": {"self": "https://api.twitch.tv/kraken/channels/test_channel","follows": "https://api.twitch.tv/kraken/channels/test_channel/follows","commercial": "https://api.twitch.tv/kraken/channels/test_channel/commercial","stream_key": "https://api.twitch.tv/kraken/channels/test_channel/stream_key","chat": "https://api.twitch.tv/kraken/chat/test_channel","features": "https://api.twitch.tv/kraken/channels/test_channel/features","subscriptions": "https://api.twitch.tv/kraken/channels/test_channel/subscriptions","editors": "https://api.twitch.tv/kraken/channels/test_channel/editors","teams": "https://api.twitch.tv/kraken/channels/test_channel/teams","videos": "https://api.twitch.tv/kraken/channels/test_channel/videos"}}],"_total": 42679,"_links": {"self": "https://api.twitch.tv/kraken/search/channels?limit=10&offset=0&q=starcraft","next": "https://api.twitch.tv/kraken/search/channels?limit=10&offset=10&q=starcraft"}}';
            $data = json_decode($json, true);

            $channelFactory = new ChannelFactory();
            $channelList = $channelFactory->createChannels($data['channels']);

            $this->assertEquals(1, count($channelList));
            $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Channel', $channelList[0]);
            $this->assertEquals(true, $channelList[0]->isPartner());
            $this->assertEquals('StarCraft II: Heart of the Swarm', $channelList[0]->getGame());
        }
}
