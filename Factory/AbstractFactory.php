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
    protected function createLinks(array $data)
    {
        $links = [];
        foreach ($data as $key => $value) {
            $links[$key] = $value;
        }

        return $links;
    }

    /**
     * @param array $data
     *
     * @return array
     */
    protected function createNotifications(array $data)
    {
        $links = [];
        foreach ($data as $key => $value) {
            $links[$key] = $value;
        }

        return $links;
    }
}
