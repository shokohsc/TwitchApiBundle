<?php

namespace Shoko\TwitchApiBundle\Model\Entity\Traits;

/**
 * Trait TotalTrait.
 */
trait TotalTrait
{
    /**
     * Total string $total.
     *
     * @var int
     */
    private $total = 0;

    /**
     * Get total.
     *
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set total.
     *
     * @param int $total
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }
}
