<?php

namespace Shoko\TwitchApiBundle\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\Traits\Viewersable;

/**
 * TopList class.
 */
class TopList
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
     * @return TopList
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
     * @return TopList
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
     * @return TopList
     */
    public function setChannels($channels)
    {
        $this->channels = $channels;

        return $this;
    }
}
