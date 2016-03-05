<?php

namespace Shoko\TwitchApiBundle\Factory;

use Shoko\TwitchApiBundle\Model\Entity\Rank;
use Shoko\TwitchApiBundle\Factory\GameFactory;

/**
 * Class RankFactory.
 */
class RankFactory implements FactoryInterface
{
    /**
     * @param array      $data
     * @param false|Rank $rank
     *
     * @return Rank
     */
    public function createEntity(array $data, $rank = false)
    {
        if (false === $rank) {
            $rank = Rank::create();
        }

        if (isset($data['game'])) {
            $rank->setGame((new GameFactory())->createEntity($data['game']));
        }

        if (isset($data['viewers'])) {
            $rank->setViewers($data['viewers']);
        }

        if (isset($data['channels'])) {
            $rank->setChannels($data['channels']);
        }

        if (isset($data['_links'])) {
            $rank = $rank->setLinks($data['_links']);
        }

        return $rank;
    }
}
