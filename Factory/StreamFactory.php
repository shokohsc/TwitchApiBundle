<?php

namespace Shoko\TwitchApiBundle\Factory;

use Shoko\TwitchApiBundle\Model\Entity\Stream;

/**
 * Class StreamFactory.
 */
class StreamFactory
{
    /**
     * @param array $data
     *
     * @return Stream
     */
    public function createStream(array $data, $stream = false)
    {
        if (false === $stream) {
            $stream = Stream::create();
        }

        if (isset($data['playlist'])) {
            $stream = $stream->setPlaylist($data['playlist']);
        }

        if (isset($data['game'])) {
            $stream = $stream->setGame($data['game']);
        }

        if (isset($data['delay'])) {
            $stream = $stream->setDelay($data['delay']);
        }

        if (isset($data['viewers'])) {
            $stream = $stream->setViewers($data['viewers']);
        }

        if (isset($data['created_at'])) {
            $stream = $stream->setCreatedAt(new \DateTime($data['created_at']));
        }

        if (isset($data['_links'])) {
            $stream = $stream->setLinks($data['_links']);
        }

        if (isset($data['_id'])) {
            $stream = $stream->setId($data['_id']);
        }

        if (isset($data['average_fps'])) {
            $stream = $stream->setAverageFps($data['average_fps']);
        }

        if (isset($data['video_height'])) {
            $stream = $stream->setVideoHeight($data['video_height']);
        }

        if (isset($data['channel'])) {
            $stream = $stream->setChannel((new ChannelFactory())->createChannel($data['channel']));
        }

        if (isset($data['preview'])) {
            $stream = $stream->setPreview($data['preview']);
        }

        return $stream;
    }
}
