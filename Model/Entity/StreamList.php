<?php

namespace Shoko\TwitchApiBundle\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\Traits\LinksTrait;
use Shoko\TwitchApiBundle\Model\Entity\Traits\TotalTrait;

/**
 * StreamList class.
 */
class StreamList
{
    use LinksTrait, TotalTrait;

    /**
     * Streams array $streams.
     *
     * @var array
     */
    private $streams = array();

    /**
     * @return StreamList
     */
    public static function create()
    {
        return new self();
    }

    /**
     * Get streams method.
     *
     * @return array
     */
    public function getStreams()
    {
        return $this->streams;
    }

    /**
     * Set streams method.
     *
     * @param array $streams
     *
     * @return StreamList
     */
    public function setStreams(array $streams)
    {
        $this->streams = $streams;

        return $this;
    }
}
