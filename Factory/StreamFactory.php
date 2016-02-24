<?php

namespace Shoko\TwitchApiBundle\Factory;

use Shoko\TwitchApiBundle\Model\Entity\Stream;
use Shoko\TwitchApiBundle\Model\Entity\StreamList;

/**
 * Class StreamFactory.
 */
class StreamFactory implements FactoryInterface
{
    /**
     * @param array $data
     *
     * @return Stream
     */
    public function createEntity(array $data, $stream = false)
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
            $stream = $stream->setChannel((new ChannelFactory())->createEntity($data['channel']));
        }

        if (isset($data['preview'])) {
            $stream = $stream->setPreview($data['preview']);
        }

        return $stream;
    }

    /**
     * @param array $data
     * @param false|StreamList $streamList
     *
     * @return StreamList
     */
    public function createList(array $data, $streamList = false)
    {
        if (false === $streamList) {
            $streamList = StreamList::create();
        }

        if (isset($data['streams'])) {
            $streamList = $streamList->setStreams($this->createStreams($data['streams']));
        }

        if (isset($data['_links'])) {
            $streamList = $streamList->setLinks($data['_links']);
        }

        if (isset($data['_total'])) {
            $streamList = $streamList->setTotal($data['_total']);
        }

        return $streamList;
    }

    /**
     * @param  array  $streams
     * @return array
     */
    public function createStreams(array $streams)
    {
        $tmp = [];
        foreach ($streams as $entry) {
            $tmp[] = $this->createEntity($entry);
        }

        return $tmp;
    }
}
