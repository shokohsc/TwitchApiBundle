<?php

namespace Shoko\TwitchApiBundle\Factory;

use Shoko\TwitchApiBundle\Model\Entity\Top;

/**
 * Class TopFactory.
 */
class TopFactory implements FactoryInterface
{
    /**
     * @param array $data
     *
     * @return Top
     */
    public function createEntity(array $data, $top = false)
    {
        if (false === $top) {
            $top = Top::create();
        }

        if (isset($data['top'])) {
            $top = $top->setPositions($this->createPositions($data['top']));
        }

        if (isset($data['_links'])) {
            $top = $top->setLinks($data['_links']);
        }

        if (isset($data['_total'])) {
            $top = $top->setTotal($data['_total']);
        }

        return $top;
    }

    public function createPositions(array $top)
    {
        $tmp = [];
        foreach ($top as $value) {
            $tmp[] = (new PositionFactory())->createEntity($value);
        }

        return $tmp;
    }
}
