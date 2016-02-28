<?php

namespace Shoko\TwitchApiBundle\Factory;

use Shoko\TwitchApiBundle\Model\Entity\Follow;
use Shoko\TwitchApiBundle\Model\Entity\GameList;

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

    /**
     * @param array            $data
     * @param false|FollowList $followList
     *
     * @return FollowList
     */
    public function createList(array $data, $followList = false)
    {
        if (false === $followList) {
            $followList = FollowList::create();
        }

        if (isset($data['follows'])) {
            $followList = $followList->setFollows($this->createFollows($data['follows']));
        }

        if (isset($data['_links'])) {
            $followList = $followList->setLinks($data['_links']);
        }

        if (isset($data['_total'])) {
            $followList = $followList->setTotal($data['_total']);
        }

        return $followList;
    }

    /**
     * @param array $follows
     *
     * @return array
     */
    public function createFollows(array $follows)
    {
        $tmp = [];
        foreach ($follows as $entry) {
            $tmp[] = $this->createEntity($entry);
        }

        return $tmp;
    }

    /**
     * @param array            $data
     * @param false|FollowList $followList
     *
     * @return FollowList
     */
    public function createGameList(array $data, $gameList = false)
    {
        if (false === $gameList) {
            $gameList = GameList::create();
        }

        if (isset($data['follows'])) {
            $gameList = $gameList->setGames((new GameFactory())->createGames($data['follows']));
        }

        if (isset($data['_links'])) {
            $gameList = $gameList->setLinks($data['_links']);
        }

        if (isset($data['_total'])) {
            $gameList = $gameList->setTotal($data['_total']);
        }

        return $gameList;
    }
}
