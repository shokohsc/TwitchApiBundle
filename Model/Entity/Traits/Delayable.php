<?php

namespace Shoko\TwitchApiBundle\Model\Entity\Traits;

/**
 * Trait Delayable
 */
trait Delayable
{
    /**
     * Delay integer|null $delay
     * @var integer|null
     */
    private $delay = null;

    /**
     * Get delay
     * @return integer|null
     */
    public function getDelay()
    {
        return $this->delay;
    }

    /**
     * Set delay
     * @param integer|null $delay
     */
    public function setDelay($delay)
    {
        $this->delay = $delay;

        return $this;
    }
}
