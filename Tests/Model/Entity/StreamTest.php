<?php

namespace Shoko\TwitchApiBundle\Tests\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\Stream;
use Shoko\TwitchApiBundle\Model\Entity\Channel;

/**
 * StreamTest class.
 */
class StreamTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test Get/Set, create, endpoint methods.
     */
    public function testStreamEntity()
    {
        $stream = Stream::create();

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Stream', $stream);

        $this->assertEquals(Stream::ENDPOINT, constant(get_class($stream).'::ENDPOINT'));

        $this->assertEquals(null, $stream->getGame());
        $this->assertEquals('some_game', $stream->setGame('some_game')->getGame());

        $date = new \DateTime();
        $this->assertEquals(null, $stream->getCreatedAt());
        $this->assertEquals($date, $stream->setCreatedAt($date)->getCreatedAt());

        $this->assertEquals(array(), $stream->getLinks());
        $link = 'some_link';
        $this->assertEquals([$link], $stream->setLinks([$link])->getLinks());

        $this->assertEquals(array(), $stream->getPreview());
        $preview = 'some_preview';
        $this->assertEquals([$preview], $stream->setPreview([$preview])->getPreview());

        $this->assertEquals(null, $stream->getId());
        $this->assertEquals('some_id', $stream->setId('some_id')->getId());

        $this->assertEquals(false, $stream->isPlaylist());
        $this->assertEquals(true, $stream->setPlaylist(true)->isPlaylist());

        $this->assertEquals(null, $stream->getDelay());
        $this->assertEquals('some_delay', $stream->setDelay('some_delay')->getDelay());

        $this->assertEquals(0, $stream->getViewers());
        $this->assertEquals(42, $stream->setViewers(42)->getViewers());

        $this->assertEquals(0, $stream->getVideoHeight());
        $this->assertEquals(1080, $stream->setVideoHeight(1080)->getVideoHeight());

        $this->assertEquals(0, $stream->getAverageFps());
        $this->assertEquals(42.42, $stream->setAverageFps(42.42)->getAverageFps());

        $this->assertEquals(null, $stream->getChannel());
        $channel = Channel::create();
        $this->assertEquals($channel, $stream->setChannel($channel)->getChannel());
    }
}
