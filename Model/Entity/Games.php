<?php

namespace Shoko\TwitchApiBundle\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\Traits\Viewersable;

/**
 * Games class.
 */
class Games
{
    use Viewersable;

    /**
     * Game $game.
     *
     * @var Game
     */
    private $game = null;

    /**
     * Channels int $channels.
     *
     * @var int
     */
    private $channels = 0;

    /**
     * @return Games
     */
    public static function create()
    {
        return new self();
    }

    /**
     * Get game.
     *
     * @return Game
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * Set game.
     *
     * @param Game $game
     *
     * @return Games
     */
    public function setGame(Game $game)
    {
        $this->game = $game;

        return $this;
    }

    /**
     * Get channels.
     *
     * @return int
     */
    public function getChannels()
    {
        return $this->channels;
    }

    /**
     * Set channels.
     *
     * @param int $channels
     *
     * @return Games
     */
    public function setChannels($channels)
    {
        $this->channels = $channels;

        return $this;
    }
}
