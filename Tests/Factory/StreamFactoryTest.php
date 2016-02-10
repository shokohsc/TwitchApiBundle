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
        $data = [
          'created_at' => '2011-06-03T17:49:19Z',
          '_links' => [
            'self'    => 'https://api.twitch.tv/kraken/streams/test_channel1',
          ],
          '_id' => 21229404,
          'playlist' => true,
          'game' => 'Gaming Talk Shows',
          'delay' => 0,
          'viewers' => 4243,
          'average_fps' => 60,
          'video_height' => 720,
          'channel' => [
            'name' => 'test_stream1',
            'created_at' => '2011-06-03T17:49:19Z',
            'updated_at' => '2012-06-18T17:19:57Z',
            '_links' => [
              'self'    => 'https://api.twitch.tv/kraken/channels/test_channel1',
              'another_key' => 'another_value',
            ],
            'logo' => 'http://static-cdn.jtvnw.net/jtv_channel_pictures/test_channel1-profile_image-62e8318af864d6d7-300x300.jpeg',
            '_id' => 21229404,
            'display_name' => 'test_stream1',
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

        $streamFactory = new StreamFactory;
        $stream = $streamFactory->createStream($data);

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Stream', $stream);
        $this->assertEquals(new \DateTime('2011-06-03T17:49:19Z'), $stream->getCreatedAt());
        $this->assertArrayHasKey('self', $stream->getLinks());
        $this->assertEquals('https://api.twitch.tv/kraken/streams/test_channel1', $stream->getLinks()['self']);
        $this->assertEquals(21229404, $stream->getId());
        $this->assertEquals(true, $stream->isPlaylist());
        $this->assertEquals('Gaming Talk Shows', $stream->getGame());
        $this->assertEquals(0, $stream->getDelay());
        $this->assertEquals(4243, $stream->getViewers());
        $this->assertEquals(60, $stream->getAverageFps());
        $this->assertEquals(720, $stream->getVideoHeight());
        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Channel', $stream->getChannel());
    }
}
