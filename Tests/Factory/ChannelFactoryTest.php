<?php

namespace Shoko\TwitchApiBundle\Tests\Factory;

use Shoko\TwitchApiBundle\Factory\ChannelFactory;
use Shoko\TwitchApiBundle\Model\Entity\Channel;

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
        $data = json_decode($json, true);

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
}
