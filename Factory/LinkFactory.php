<?php

namespace Shoko\TwitchApiBundle\Factory;

use Shoko\TwitchApiBundle\Model\Entity\ValueObject\Link;

/**
 * Class LinkFactory
 */
class LinkFactory
{
    /**
     * @param array $data
     *
     * @return Link
     */
    public function createLink(array $data)
    {
        $link = Link::create();

        if (key($data)) {
            $link = $link->setKey(key($data));
        }

        if (current($data)) {
            $link = $link->setValue(current($data));
        }

        return $link;
    }
}
