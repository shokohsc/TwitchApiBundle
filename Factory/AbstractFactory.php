<?php

namespace Shoko\TwitchApiBundle\Factory;

use Shoko\TwitchApiBundle\Model\Lists\LinkList;

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
    protected function createLinkList($data)
    {
        return LinkList::create($data);
    }
}
