<?php

namespace Shoko\TwitchApiBundle\Factory;

use Shoko\TwitchApiBundle\Model\Entity\Top;
use Shoko\TwitchApiBundle\Model\Entity\Rank;

/**
 * Class TopFactory.
 */
class TopFactory implements FactoryInterface
{
    /**
     * @param array      $data
     * @param false|Game $rank
     *
     * @return Game
     */
    public function createEntity(array $data, $rank = false)
    {
        if (false === $rank) {
            $rank = Top::create();
        }

        if (isset($data['top'])) {
            $rank = $rank->setRanks($this->createRanks($data['top']));
        }

        if (isset($data['_links'])) {
            $rank = $rank->setLinks($data['_links']);
        }

        if (isset($data['_total'])) {
            $rank = $rank->setTotal($data['_total']);
        }

        return $rank;
    }

    /**
     * @param array $ranks
     *
     * @return array
     */
    public function createRanks(array $ranks)
    {
        $tmp = [];
        foreach ($ranks as $entry) {
            $rank = Rank::create();

            if (isset($entry['game'])) {
                $rank->setGame((new GameFactory())->createEntity($entry['game']));
            }

            if (isset($entry['viewers'])) {
                $rank->setViewers($entry['viewers']);
            }

            if (isset($entry['channels'])) {
                $rank->setChannels($entry['channels']);
            }

            $tmp[] = $rank;
        }

        return $tmp;
    }
}
