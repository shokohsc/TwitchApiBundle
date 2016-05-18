<?php

namespace Shoko\TwitchApiBundle\Model\Entity\Traits;

/**
 * Trait DelayTrait.
 */
trait DelayTrait
{
    /**
     * Delay int|string|null $delay.
     *
     * @var int|string|null
     */
    private $delay = null;

    /**
     * Get delay.
     *
     * @return int|string|null
     */
    public function getDelay()
    {
        return $this->delay;
    }

    /**
     * Set delay.
     *
     * @param int|string|null $delay
     */
    public function setDelay($delay)
    {
        $this->delay = $delay;

        return $this;
    }
}
