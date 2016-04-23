<?php

namespace Shoko\TwitchApiBundle\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\Traits\LinksTrait;
use Shoko\TwitchApiBundle\Model\Entity\Traits\TotalTrait;

/**
 * GameList class.
 */
class GameList
{
    use LinksTrait, TotalTrait;

    /**
     * Games array $games.
     *
     * @var array
     */
    private $games = array();

    /**
     * @return GameList
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
     * @return GameList
     */
    public function setGames(array $games)
    {
        $this->games = $games;

        return $this;
    }
}
