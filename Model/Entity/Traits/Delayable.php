<?php

namespace Shoko\TwitchApiBundle\Model\Entity\Traits;

/**
 * Trait Delayable
 */
trait Delayable
{
    /**
     * Delay string $delay
     * @var string
     */
    private $delay = null;

    /**
     * Get delay
     * @return string
     */
    public function getDelay()
    {
        return $this->delay;
    }

    /**
     * Set delay
     * @param string $delay
     */
    public function setDelay($delay)
    {
        $this->delay = $delay;

        return $this;
    }
}
