<?php

namespace Shoko\TwitchApiBundle\Repository;

use Shoko\TwitchApiBundle\Lib\Client;
use Shoko\TwitchApiBundle\Factory\FactoryInterface;
use Shoko\TwitchApiBundle\Util\JsonTransformer;
use GuzzleHttp\Psr7\Response;

/**
 * Class AbstractRepository.
 */
class AbstractRepository
{
    /**
     * Client $client.
     *
     * @var Client
     */
    private $client;

    /**
     * FactoryInterface $factory.
     *
     * @var FactoryInterface
     */
    private $factory;

    /**
     * JsonTransformer $transformer.
     *
     * @var JsonTransformer
     */
    private $transformer;

    /**
     * Constructor method.
     *
     * @param Client           $client
     * @param FactoryInterface $factory
     * @param JsonTransformer  $transformer
     */
    public function __construct(Client $client, FactoryInterface $factory, JsonTransformer $transformer)
    {
        $this->client = $client;
        $this->factory = $factory;
        $this->transformer = $transformer;
    }

    /**
     * Get Client $client.
     *
     * @return Client
     */
    protected function getClient()
    {
        return $this->client;
    }

    /**
     * Get FactoryInterface $factory.
     *
     * @return FactoryInterface
     */
    protected function getFactory()
    {
        return $this->factory;
    }

    /**
     * Get JsonTransformer $transformer.
     *
     * @return JsonTransformer
     */
    protected function getTransformer()
    {
        return $this->transformer;
    }

    /**
     * Get Json object to Assoc array.
     *
     * @param Response $response
     *
     * @return array
     */
    protected function jsonResponse(Response $response)
    {
        return $this->getTransformer()->transform($response->getBody()->getContents());
    }
}
