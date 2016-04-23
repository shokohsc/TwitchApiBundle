<?php

namespace Shoko\TwitchApiBundle\Model\Entity\Traits;

use Shoko\TwitchApiBundle\Model\Entity\Channel;

/**
 * Trait ChannelTrait.
 */
trait ChannelTrait
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
     * @return Channel
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * Set channel.
     *
     * @param Channel $channel
     */
    public function setChannel(Channel $channel)
    {
        $this->channel = $channel;

        return $this;
    }
}
