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

    /**
     * Constructor method.
     * @param Client           $client
     * @param FactoryInterface $factory
     */
    public function __construct(Client $client, FactoryInterface $factory)
    {
        $this->client = $client;
        $this->factory = $factory;
    }

    /**
     * Get Client $client
     * @return Client
     */
    protected function getClient()
    {
        return $this->client;
    }

    /**
     * Get FactoryInterface $factory
     * @return FactoryInterface
     */
    protected function getFactory()
    {
        return $this->factory;
    }

    /**
     * Get Json object to Assoc array
     * @param  Response $response
     * @return array
     */
    protected function jsonResponse(Response $response)
    {
        return json_decode($response->getBody()->getContents(), true);
    }
}
