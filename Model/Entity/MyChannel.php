<?php

namespace Shoko\TwitchApiBundle\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\Traits\Emailable;
use Shoko\TwitchApiBundle\Model\Entity\Channel;

/**
 * MyChannel class.
 */
class MyChannel extends Channel
{
    const ENDPOINT = 'channel';

    use Emailable;

    /**
     * Stream key string $streamKey
     * @var string
     */
    private $streamKey;

    /**
     * @return Channel
     */
    public static function create()
    {
        return new MyChannel;
    }

    /**
     * Get streamKey
     * @return string
     */
    public function getStreamKey()
    {
        return $this->streamKey;
    }

    /**
     * Set streamKey
     * @param string $streamKey
     * @return MyChannel
     */
    public function setStreamKey($streamKey)
    {
        $this->streamKey = $streamKey;

        return $this;
    }
}
