<?php

namespace Shoko\TwitchApiBundle\Model\Entity\Traits;

/**
 * Trait Viewersable.
 */
trait Viewersable
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
    public function setViewers($viewers)
    {
        $this->viewers = $viewers;

        return $this;
    }
}
