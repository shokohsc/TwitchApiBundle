<?php

namespace Shoko\TwitchApiBundle\Factory;

use Shoko\TwitchApiBundle\Model\Entity\Game;
use Shoko\TwitchApiBundle\Model\Entity\Top;
use Shoko\TwitchApiBundle\Factory\GamesFactory;

/**
 * Class GameFactory.
 */
class GameFactory implements FactoryInterface
{
    /**
     * @param array $data
     * @param false|Game $game
     *
     * @return Game
     */
    public function createEntity(array $data, $game = false)
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

    /**
     * @param array $data
     * @param false|Top $top
     *
     * @return Top
     */
    public function createTop(array $data, $top = false)
    {
        if (false === $top) {
            $top = Top::create();
        }

        if (isset($data['top'])) {
            $top = $top->setGames($this->createGames($data['top']));
        }

        if (isset($data['_links'])) {
            $top = $top->setLinks($data['_links']);
        }

        if (isset($data['_total'])) {
            $top = $top->setTotal($data['_total']);
        }

        return $top;
    }

    /**
     * @param  array  $games
     * @return array
     */
    public function createGames(array $games)
    {
        $tmp = [];
        foreach ($games as $entry) {
            $tmp[] = (new GamesFactory())->createEntity($entry);
        }

        return $tmp;
    }

}
