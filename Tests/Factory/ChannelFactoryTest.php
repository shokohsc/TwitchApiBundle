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
        $data = [
          'name' => 'test_channel1',
          'created_at' => '2011-06-03T17:49:19Z',
          'updated_at' => '2012-06-18T17:19:57Z',
          '_links' => [
            'self' => 'https://api.twitch.tv/kraken/channels/test_channel1',
            'another_key' => 'another_value',
          ],
          'logo' => 'http://static-cdn.jtvnw.net/jtv_channel_pictures/test_channel1-profile_image-62e8318af864d6d7-300x300.jpeg',
          '_id' => 21229404,
          'display_name' => 'test_channel1',
          'mature' => false,
          'status' => 'test status',
          'broadcaster_language' => 'en',
          'game' => 'Gaming Talk Shows',
          'delay' => null,
          'language' => 'en',
          'banner' => 'some_banner_link',
          'video_banner' => 'some_video_banner_link',
          'background' => 'some_background',
          'profile_banner' => 'some_profile_banner_link',
          'profile_banner_background_color' => null,
          'partner' => true,
          'url' => 'some_url',
          'views' => 42,
          'followers' => 42,
        ];

        $channelFactory = new ChannelFactory();
        $channel = $channelFactory->createChannel($data);

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Channel', $channel);
        $this->assertEquals('test_channel1', $channel->getName());
        $this->assertEquals(new \DateTime('2011-06-03T17:49:19Z'), $channel->getCreatedAt());
        $this->assertEquals(new \DateTime('2012-06-18T17:19:57Z'), $channel->getUpdatedAt());
        $this->assertArrayHasKey('self', $channel->getLinks());
        $this->assertEquals('https://api.twitch.tv/kraken/channels/test_channel1', $channel->getLinks()['self']);
        $this->assertArrayHasKey('another_key', $channel->getLinks());
        $this->assertEquals('another_value', $channel->getLinks()['another_key']);
        $this->assertEquals('http://static-cdn.jtvnw.net/jtv_channel_pictures/test_channel1-profile_image-62e8318af864d6d7-300x300.jpeg', $channel->getLogo());
        $this->assertEquals(21229404, $channel->getId());
        $this->assertEquals('test_channel1', $channel->getDisplayName());
        $this->assertEquals(false, $channel->isMature());
        $this->assertEquals('test status', $channel->getStatus());
        $this->assertEquals('en', $channel->getBroadcasterLanguage());
        $this->assertEquals('Gaming Talk Shows', $channel->getGame());
        $this->assertEquals(null, $channel->getDelay());
        $this->assertEquals('en', $channel->getLanguage());
        $this->assertEquals('some_banner_link', $channel->getBanner());
        $this->assertEquals('some_video_banner_link', $channel->getVideoBanner());
        $this->assertEquals('some_background', $channel->getBackground());
        $this->assertEquals('some_profile_banner_link', $channel->getProfileBanner());
        $this->assertEquals(null, $channel->getProfileBannerBackgroundColor());
        $this->assertEquals(true, $channel->isPartner());
        $this->assertEquals('some_url', $channel->getUrl());
        $this->assertEquals(42, $channel->getViews());
        $this->assertEquals(42, $channel->getFollowers());
    }
}
