<?php

namespace Shoko\TwitchApiBundle\Factory;

use Shoko\TwitchApiBundle\Model\Entity\Top;
use Shoko\TwitchApiBundle\Model\Entity\TopList;
use Shoko\TwitchApiBundle\Factory\GameFactory;

/**
 * Class TopFactory.
 */
class TopFactory implements FactoryInterface
{
    /**
     * @param array $data
     * @param false|Game $top
     *
     * @return Game
     */
    public function createEntity(array $data, $top = false)
    {
        if (false === $top) {
            $top = Top::create();
        }

        if (isset($data['top'])) {
            $top = $top->setTops($this->createTops($data['top']));
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
     * @param  array  $tops
     * @return array
     */
    public function createTops(array $tops)
    {
        $tmp = [];
        foreach ($tops as $entry) {
            $topList = TopList::create();

            if (isset($entry['game'])) {
                $topList->setGame((new GameFactory())->createEntity($entry['game']));
            }

            if (isset($entry['viewers'])) {
                $topList->setChannels($entry['viewers']);
            }

            if (isset($entry['channels'])) {
                $topList->setChannels($entry['channels']);
            }

            $tmp[] = $topList;
        }

        return $tmp;
    }
}
