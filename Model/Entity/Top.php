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
     * Games array $games.
     *
     * @var array
     */
    private $games = array();

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
     * Get games method.
     *
     * @return array
     */
    public function getGames()
    {
        return $this->games;
    }

    /**
     * Set games method.
     *
     * @param array $games
     *
     * @return Top
     */
    public function setGames(array $games)
    {
        $this->games = $games;

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
