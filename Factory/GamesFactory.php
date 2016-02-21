<?php

namespace Shoko\TwitchApiBundle\Factory;

use Shoko\TwitchApiBundle\Model\Entity\Games;

/**
 * Class GamesFactory.
 */
class GamesFactory implements FactoryInterface
{
    /**
     * @param array $data
     *
     * @return Games
     */
    public function createEntity(array $data, $position = false)
    {
        if (false === $position) {
            $position = Games::create();
        }

        if (isset($data['game'])) {
            $position = $position->setGame((new GameFactory())->createEntity($data['game']));
        }

        if (isset($data['viewers'])) {
            $position = $position->setViewers($data['viewers']);
        }

        if (isset($data['channels'])) {
            $position = $position->setChannels($data['channels']);
        }

        return $position;
    }
}
