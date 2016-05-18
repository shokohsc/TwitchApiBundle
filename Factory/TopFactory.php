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
     * @param false|Top $top
     *
     * @return Top
     */
    public function createEntity(array $data, $top = false) : Top
    {
        if (false === $top) {
            $top = Top::create();
        }

        if (isset($data['top'])) {
            $top = $top->setRanks($this->createRanks($data['top']));
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
     * @param array $ranks
     *
     * @return array
     */
    public function createRanks(array $ranks) : array
    {
        $tmp = [];
        foreach ($ranks as $entry) {
            $tmp[] = (new RankFactory())->createEntity($entry);
        }

        return $tmp;
    }
}
