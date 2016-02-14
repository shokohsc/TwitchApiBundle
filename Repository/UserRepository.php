<?php

namespace Shoko\TwitchApiBundle\Repository;

use Shoko\TwitchApiBundle\Repository\AbstractRepository;
use Shoko\TwitchApiBundle\Model\Entity\User;

/**
 * Class UserRepository.
 */
class UserRepository extends AbstractRepository
{
    /**
     * Get user
     * @param  string $userId
     * @return User
     */
    public function getUser($userId)
    {
        $response = $this->getClient()->get(User::ENDPOINT.$userId);
        $data = $this->jsonResponse($response);

        return $this->getFactory()->createEntity($data);
    }
}
