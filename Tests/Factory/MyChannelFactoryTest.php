<?php

namespace Shoko\TwitchApiBundle\Tests\Factory;

use Shoko\TwitchApiBundle\Factory\MyChannelFactory;
use Shoko\TwitchApiBundle\Model\Entity\MyChannel;

/**
 * MyChannelFactoryTest class.
 */
class MyChannelFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test create channel method.
     */
    public function testCreateMyChannel()
    {
        $data = [
          'name' => 'test_channel1',
          'created_at' => '2011-06-03T17:49:19Z',
          'updated_at' => '2012-06-18T17:19:57Z',
          '_links' => [
            'self'    => 'https://api.twitch.tv/kraken/channels/test_channel1',
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
          'email' => 'some_email',
          'stream_key' => 'live_5439587_s8df7s9d7g6dsfggsdfg',
        ];

        $myChannelFactory = new MyChannelFactory;
        $myChannel = $myChannelFactory->createMyChannel($data);

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\MyChannel', $myChannel);
        $this->assertEquals('test_channel1', $myChannel->getName());
        $this->assertEquals(new \DateTime('2011-06-03T17:49:19Z'), $myChannel->getCreatedAt());
        $this->assertEquals(new \DateTime('2012-06-18T17:19:57Z'), $myChannel->getUpdatedAt());
        $this->assertArrayHasKey('self', $myChannel->getLinks());
        $this->assertEquals('https://api.twitch.tv/kraken/channels/test_channel1', $myChannel->getLinks()['self']);
        $this->assertArrayHasKey('another_key', $myChannel->getLinks());
        $this->assertEquals('another_value', $myChannel->getLinks()['another_key']);
        $this->assertEquals('http://static-cdn.jtvnw.net/jtv_channel_pictures/test_channel1-profile_image-62e8318af864d6d7-300x300.jpeg', $myChannel->getLogo());
        $this->assertEquals(21229404, $myChannel->getId());
        $this->assertEquals('test_channel1', $myChannel->getDisplayName());
        $this->assertEquals(false, $myChannel->isMature());
        $this->assertEquals('test status', $myChannel->getStatus());
        $this->assertEquals('en', $myChannel->getBroadcasterLanguage());
        $this->assertEquals('Gaming Talk Shows', $myChannel->getGame());
        $this->assertEquals(null, $myChannel->getDelay());
        $this->assertEquals('en', $myChannel->getLanguage());
        $this->assertEquals('some_banner_link', $myChannel->getBanner());
        $this->assertEquals('some_video_banner_link', $myChannel->getVideoBanner());
        $this->assertEquals('some_background', $myChannel->getBackground());
        $this->assertEquals('some_profile_banner_link', $myChannel->getProfileBanner());
        $this->assertEquals(null, $myChannel->getProfileBannerBackgroundColor());
        $this->assertEquals(true, $myChannel->isPartner());
        $this->assertEquals('some_url', $myChannel->getUrl());
        $this->assertEquals(42, $myChannel->getViews());
        $this->assertEquals(42, $myChannel->getFollowers());
        $this->assertEquals('some_email', $myChannel->getEmail());
        $this->assertEquals('live_5439587_s8df7s9d7g6dsfggsdfg', $myChannel->getStreamKey());
    }
}
