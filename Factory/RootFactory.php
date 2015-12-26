<?php

namespace Shoko\TwitchApiBundle\Factory;

use Shoko\TwitchApiBundle\Model\Entity\Root;

/**
 * Class RootFactory
 */
class RootFactory extends AbstractFactory
{
    /**
     * @param array $data
     *
     * @return Root
     */
    public function createRoot(array $data)
    {
        $root = Root::create();

        if (isset($data['token'])) {
            $root = $root->setToken($data['token']);
        }

        if (isset($data['_links'])) {
            $root = $root->setlinks($this->createLinkList($data['_links']));
        }

        return $root;
    }
}
