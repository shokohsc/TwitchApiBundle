<?php

namespace Shoko\TwitchApiBundle\Tests\Factory;

use Shoko\TwitchApiBundle\Factory\FollowFactory;
use Shoko\TwitchApiBundle\Model\Entity\Follow;

/**
 * FollowFactoryTest class.
 */
class FollowFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test create follow method.
     */
    public function testCreateFollow()
    {
        $data = [
          'created_at' => '2011-06-03T17:49:19Z',
          '_links' => [
            'self'    => 'https://api.twitch.tv/kraken/follows/test_channel1',
          ],
          'notifications' => true,
          'channel' => [
            'name' => 'test_follow1',
            'created_at' => '2011-06-03T17:49:19Z',
            'updated_at' => '2012-06-18T17:19:57Z',
            '_links' => [
              'self'    => 'https://api.twitch.tv/kraken/channels/test_channel1',
              'another_key' => 'another_value',
            ],
            'logo' => 'http://static-cdn.jtvnw.net/jtv_channel_pictures/test_channel1-profile_image-62e8318af864d6d7-300x300.jpeg',
            '_id' => 21229404,
            'display_name' => 'test_follow1',
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
          ],
        ];

        $followFactory = new FollowFactory;
        $follow = $followFactory->createFollow($data);

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Follow', $follow);
        $this->assertEquals(new \DateTime('2011-06-03T17:49:19Z'), $follow->getCreatedAt());
        $this->assertArrayHasKey('self', $follow->getLinks());
        $this->assertEquals('https://api.twitch.tv/kraken/follows/test_channel1', $follow->getLinks()['self']);
        $this->assertEquals(true, $follow->isNotifications());
        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Channel', $follow->getChannel());
    }
}
