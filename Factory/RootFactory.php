<?php

namespace Shoko\TwitchApiBundle\Factory;

use Shoko\TwitchApiBundle\Model\Entity\Root;
use Shoko\TwitchApiBundle\Factory\TokenFactory;
use Shoko\TwitchApiBundle\Factory\FactoryInterface;

/**
 * Class RootFactory.
 */
class RootFactory implements FactoryInterface
{
    /**
     * @param array $data
     *
     * @return Root
     */
    public function createEntity(array $data, $root = false)
    {
        if (false === $root) {
            $root = Root::create();
        }

        if (isset($data['token'])) {
            $root = $root->setToken((new TokenFactory())->createEntity($data['token']));
        }

        if (isset($data['_links'])) {
            $root = $root->setLinks($data['_links']);
        }

        return $root;
    }
}
