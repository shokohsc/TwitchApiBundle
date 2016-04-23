<?php

namespace Shoko\TwitchApiBundle\Model\Entity\Traits;

/**
 * Trait DelayTrait.
 */
trait DelayTrait
{
    /**
     * Delay integer|null $delay.
     *
     * @var int|null
     */
    private $delay = null;

    /**
     * Get delay.
     *
     * @return int|null
     */
    public function getDelay()
    {
        return $this->delay;
    }

    /**
     * Set delay.
     *
     * @param int|null $delay
     */
    public function setDelay($delay)
    {
        $this->delay = $delay;

        return $this;
    }
}
