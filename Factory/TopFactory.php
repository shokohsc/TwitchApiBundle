<?php

namespace Shoko\TwitchApiBundle\Factory;

use Shoko\TwitchApiBundle\Model\Entity\Top;

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
            $tmp[] = (new RankFactory())->createEntity($entry);
        }

        return $tmp;
    }
}
