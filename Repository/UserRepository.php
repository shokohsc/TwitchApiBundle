<?php

namespace Shoko\TwitchApiBundle\Repository;

use Shoko\TwitchApiBundle\Lib\Client;
use Shoko\TwitchApiBundle\Factory\FollowFactory;

/**
 * Class UserRepository.
 */
class UserRepository extends AbstractRepository
{
    const ENDPOINT = 'users/';

    /**
     * Get user.
     *
     * @param string $userId
     *
     * @return User
     */
    public function getUser($userId)
    {
        $response = $this->getClient()->get(self::ENDPOINT.$userId);
        $data = $this->jsonResponse($response);

        return $this->getFactory()->createEntity($data);
    }

    /**
     * Get user followed games.
     *
     * @param string $userId
     * @param string $clientId
     * @param array $params
     *
     * @return GameList
     */
    public function getUserFollowedGames($userId, $clientId, $params = array())
    {
        $params = 0 < count($params) ? '?'.http_build_query($params) : '';
        // need old api version to get user's followed games
        $client = $this->getClient()->setUrl(Client::URL_PROTOCOL.'://'.Client::URL_HOST.'/'.Client::URL_OLD_VERSION.'/');
        $response = $this->setClient($client)->getClient()->get(self::ENDPOINT.$userId.'/follows/games/live/'.$params, array('Client-ID' => $clientId));
        // reset api endpoint to current version
        $client = $this->getClient()->setUrl(Client::URL_PROTOCOL.'://'.Client::URL_HOST.'/'.Client::URL_VERSION.'/');
        $this->setClient($client);
        $data = $this->jsonResponse($response);

        return $this->setFactory(new FollowFactory())->getFactory()->createGameList($data);
    }
}
