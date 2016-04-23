<?php

namespace Shoko\TwitchApiBundle\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\Traits\LinksTrait;
use Shoko\TwitchApiBundle\Model\Entity\Traits\TotalTrait;

/**
 * ChannelList class.
 */
class ChannelList
{
    use LinksTrait, TotalTrait;

    /**
     * Channels array $channels.
     *
     * @var array
     */
    private $channels = array();

    /**
     * @return ChannelList
     */
    public static function create()
    {
        return new self();
    }

    /**
     * Get channels method.
     *
     * @return array
     */
    public function getChannels()
    {
        return $this->channels;
    }

    /**
     * Set channels method.
     *
     * @param array $channels
     *
     * @return ChannelList
     */
    public function setChannels(array $channels)
    {
        $this->channels = $channels;

        return $this;
    }
}
