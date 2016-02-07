<?php

namespace Shoko\TwitchApiBundle\Factory;

/**
 * Class AbstractFactory
 */
class AbstractFactory
{
    /**
     * @param array $data
     *
     * @return array
     */
    protected function createLinkList(array $data)
    {
        $links = [];
        foreach ($data as $key => $value) {
            $links[$key] = $value;
        }

        return $links;
    }
}
