<?php

namespace Shoko\TwitchApiBundle\Model\Entity\Traits;

/**
 * Trait ViewersTrait.
 */
trait ViewersTrait
{
    /**
     * Viewers string $viewers.
     *
     * @var int
     */
    private $viewers = 0;

    /**
     * Get viewers.
     *
     * @return int
     */
    public function getViewers()
    {
        return $this->viewers;
    }

    /**
     * Set viewers.
     *
     * @param int $viewers
     */
    public function setViewers(int $viewers)
    {
        $this->viewers = $viewers;

        return $this;
    }
}
