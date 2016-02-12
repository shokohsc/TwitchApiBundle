<?php

namespace Shoko\TwitchApiBundle\Model\Entity\Traits;

/**
 * Trait Channelable.
 */
trait Channelable
{
    /**
     * Channel string $channel.
     *
     * @var string
     */
    private $channel = null;

    /**
     * Get channel.
     *
     * @return string
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * Set channel.
     *
     * @param string $channel
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;

        return $this;
    }
}
