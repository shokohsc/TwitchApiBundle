<?php

namespace Shoko\TwitchApiBundle\Repository;

use Shoko\TwitchApiBundle\Lib\Client;
use Shoko\TwitchApiBundle\Factory\FactoryInterface;
use GuzzleHttp\Psr7\Response;

/**
 * Class AbstractRepository.
 */
class AbstractRepository
{
    /**
     * Client $client
     * @var Client
     */
    private $client;

    /**
     * FactoryInterface $factory
     * @var FactoryInterface
     */
    private $factory;

    public function __construct(Client $client, FactoryInterface $factory)
    {
        $this->client = $client;
        $this->factory = $factory;
    }

    protected function jsonResponse(Response $response)
    {
        return json_decode($response->getBody()->getContents(), true);
    }
}
