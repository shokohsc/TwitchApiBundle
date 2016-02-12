<?php

namespace Shoko\TwitchApiBundle\Model\Entity\Traits;

/**
 * Trait Gameable.
 */
trait Gameable
{
    /**
     * Game string $game.
     *
     * @var string
     */
    private $game = null;

    /**
     * Get game.
     *
     * @return string
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * Set game.
     *
     * @param string $game
     */
    public function setGame($game)
    {
        $this->game = $game;

        return $this;
    }
}
