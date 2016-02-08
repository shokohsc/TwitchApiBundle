<?php

namespace Shoko\TwitchApiBundle\Factory;

use Shoko\TwitchApiBundle\Model\Entity\Root;

/**
 * Class RootFactory
 */
class RootFactory
{
    /**
     * @param array $data
     *
     * @return Root
     */
    public function createRoot(array $data, $root = false)
    {
        if (false === $root) {
            $root = Root::create();
        }

        if (isset($data['token'])) {
            $root = $root->setToken($data['token']);
        }

        if (isset($data['_links'])) {
            $root = $root->setLinks($data['_links']);
        }

        return $root;
    }
}
