<?php

namespace Shoko\TwitchApiBundle\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\Traits\EmailTrait;

/**
 * MyChannel class.
 */
class MyChannel extends Channel
{
    const ENDPOINT = 'channel';

    use EmailTrait;

    /**
     * Stream key string $streamKey.
     *
     * @var string
     */
    private $streamKey;

    /**
     * @return Channel
     */
    public static function create()
    {
        return new self();
    }

    /**
     * Get streamKey.
     *
     * @return string
     */
    public function getStreamKey()
    {
        return $this->streamKey;
    }

    /**
     * Set streamKey.
     *
     * @param string $streamKey
     *
     * @return MyChannel
     */
    public function setStreamKey($streamKey)
    {
        $this->streamKey = $streamKey;

        return $this;
    }
}
