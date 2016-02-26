<?php

namespace Shoko\TwitchApiBundle\Factory;

use Shoko\TwitchApiBundle\Model\Entity\Game;
use Shoko\TwitchApiBundle\Model\Entity\GameList;

/**
 * Class GameFactory.
 */
class GameFactory implements FactoryInterface
{
    /**
     * @param array      $data
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

        if (isset($data['popularity'])) {
            $game = $game->setPopularity($data['popularity']);
        }

        return $game;
    }

    /**
     * @param array          $data
     * @param false|GameList $gameList
     *
     * @return GameList
     */
    public function createList(array $data, $gameList = false)
    {
        if (false === $gameList) {
            $gameList = GameList::create();
        }

        if (isset($data['games'])) {
            $gameList = $gameList->setGames($this->createGames($data['games']));
        }

        if (isset($data['_links'])) {
            $gameList = $gameList->setLinks($data['_links']);
        }

        if (isset($data['_total'])) {
            $gameList = $gameList->setTotal($data['_total']);
        }

        return $gameList;
    }

    /**
     * @param array $games
     *
     * @return array
     */
    public function createGames(array $games)
    {
        $tmp = [];
        foreach ($games as $entry) {
            $tmp[] = $this->createEntity($entry);
        }

        return $tmp;
    }

    public function createTop(array $data, $top = false)
    {
        $top = (new TopFactory())->createEntity($data);

        return $top;
    }
}
