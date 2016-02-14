<?php

namespace Shoko\TwitchApiBundle\Repository;

use Shoko\TwitchApiBundle\Repository\AbstractRepository;
use Shoko\TwitchApiBundle\Model\Entity\User;

/**
 * Class UserRepository.
 */
class UserRepository extends AbstractRepository
{
    public function getUser($userId)
    {
        $response = $this->client->get(User::ENDPOINT.$userId);
        $data = $this->jsonResponse($response);

        return $this->factory->createEntity($data);
    }
}
