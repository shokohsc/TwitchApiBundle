<?php

namespace Shoko\TwitchApiBundle\Repository;

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
}
