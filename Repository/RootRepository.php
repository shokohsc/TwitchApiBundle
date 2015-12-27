<?php

namespace Shoko\TwitchApiBundle\Repository;

use Shoko\TwitchApiBundle\Lib\Client;
use Shoko\TwitchApiBundle\Factory\RootFactory;
use Shoko\TwitchApiBundle\Model\Entity\Root;

class RootRepository
{
    /**
     * @var Shoko\TwitchApiBundle\Lib\Client
     */
    private $client;

    /**
     * @var Shoko\TwitchApiBundle\Factory\RootFactory
     */
    private $factory;

    /**
     * @param Client      $client
     * @param RootFactory $factory
     */
    public function __construct(Client $client, RootFactory $factory)
    {
        $this->client = $client;
        $this->factory = $factory;
    }

    /**
     * @return Root
     */
    public function getRoot()
    {
        $data = $this->client
                     ->get(Root::ENDPOINT)
                     ->getBody()
                ;

        return $this->factory->createRoot(json_decode($data, true));
    }
}
