<?php

namespace Shoko\TwitchApiBundle\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\Traits\Linksable;

/**
 * Top class.
 */
class Top
{
    use Linksable;

    /**
     * Positions array $positions.
     *
     * @var array
     */
    private $positions = array();

    /**
     * Total int $total.
     *
     * @var int
     */
    private $total = 0;

    /**
     * @return Top
     */
    public static function create()
    {
        return new self();
    }

    /**
     * Get positions method.
     *
     * @return array
     */
    public function getPositions()
    {
        return $this->positions;
    }

    /**
     * Set positions method.
     *
     * @param array $positions
     *
     * @return Top
     */
    public function setPositions(array $positions)
    {
        $this->positions = $positions;

        return $this;
    }

    /**
     * Get total method.
     *
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set total method.
     *
     * @param int $total
     *
     * @return Top
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }
}
