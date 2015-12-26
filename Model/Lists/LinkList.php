<?php

namespace Shoko\TwitchApiBundle\Model\Lists;

use Shoko\TwitchApiBundle\Factory\LinkFactory;

class LinkList
{
    /**
     * @param $links
     *
     * @return LinkList
     */
    public static function create($links)
    {
        return self::getLinks($links);
    }

    /**
     * @param $links
     *
     * @return array
     */
    private static function getLinks($data)
    {
        $links = [];
        foreach ($data as $key => $value) {
            $links[] = (new LinkFactory)->createLink([$key => $value]);
        }

        return $links;
    }
}
