<?php

namespace Shoko\TwitchApiBundle\Factory;

use Shoko\TwitchApiBundle\Model\Entity\Follow;

/**
 * Class FollowFactory.
 */
class FollowFactory implements FactoryInterface
{
    /**
     * @param array $data
     *
     * @return Follow
     */
    public function createEntity(array $data, $follow = false)
    {
        if (false === $follow) {
            $follow = Follow::create();
        }

        if (isset($data['notifications'])) {
            $follow = $follow->setNotifications($data['notifications']);
        }

        if (isset($data['created_at'])) {
            $follow = $follow->setCreatedAt(new \DateTime($data['created_at']));
        }

        if (isset($data['_links'])) {
            $follow = $follow->setLinks($data['_links']);
        }

        if (isset($data['channel'])) {
            $follow = $follow->setChannel((new ChannelFactory())->createEntity($data['channel']));
        }

        return $follow;
    }
}
