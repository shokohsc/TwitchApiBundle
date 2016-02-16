<?php

namespace Shoko\TwitchApiBundle\Factory;

use Shoko\TwitchApiBundle\Model\Entity\Position;
use Shoko\TwitchApiBundle\Factory\FactoryInterface;

/**
 * Class PositionFactory.
 */
class PositionFactory implements FactoryInterface
{
    /**
     * @param array $data
     *
     * @return Position
     */
    public function createEntity(array $data, $position = false)
    {
        if (false === $position) {
            $position = Position::create();
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
