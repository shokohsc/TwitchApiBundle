<?php

namespace Shoko\TwitchApiBundle\Repository;

use Shoko\TwitchApiBundle\Lib\Client;
use Shoko\TwitchApiBundle\Factory\UserFactory;
use Shoko\TwitchApiBundle\Model\Entity\User;

class UserRepository
{
    /**
     * @var Shoko\TwitchApiBundle\Lib\Client
     */
    private $client;

    /**
     * @var Shoko\TwitchApiBundle\Factory\UserFactory
     */
    private $factory;

    /**
     * @param Client      $client
     * @param UserFactory $factory
     */
    public function __construct(Client $client, UserFactory $factory)
    {
        $this->client = $client;
        $this->factory = $factory;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        $data = $this->client
                     ->get(User::ENDPOINT)
                     ->getBody()
                ;

        return $this->factory->createUser(json_decode($data, true));
    }
}
