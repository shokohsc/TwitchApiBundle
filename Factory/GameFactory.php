<?php

namespace Shoko\TwitchApiBundle\Factory;

use Shoko\TwitchApiBundle\Model\Entity\Game;

/**
 * Class GameFactory.
 */
class GameFactory
{
    /**
     * @param array $data
     *
     * @return Game
     */
    public function createGame(array $data, $game = false)
    {
        if (false === $game) {
            $game = Game::create();
        }

        if (isset($data['name'])) {
            $game = $game->setName($data['name']);
        }

        if (isset($data['_links'])) {
            $game = $game->setLinks($data['_links']);
        }

        if (isset($data['logo'])) {
            $game = $game->setLogo($data['logo']);
        }

        if (isset($data['box'])) {
            $game = $game->setBox($data['box']);
        }

        if (isset($data['_id'])) {
            $game = $game->setId($data['_id']);
        }

        if (isset($data['giantbomb_id'])) {
            $game = $game->setGiantBombId($data['giantbomb_id']);
        }

        return $game;
    }
}
