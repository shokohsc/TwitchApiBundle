<?php

namespace Shoko\TwitchApiBundle\Lib;

use GuzzleHttp\Client as Guzzle;
use Shoko\TwitchApiBundle\Model\ValueObject\Url;

/**
 * Client class.
 */
class Client
{
    /**
     * Guzzle $guzzle client class
     * @var Guzzle
     */
    private $guzzle;

    /**
     * Url $url class
     * @var Url
     */
    private $url;

    /**
     * array $headers Http headers to send along
     * @var array
     */
    private $headers;

    /**
     * Constructor method.
     * @param array  $headers Http headers to send along
     */

    public function __construct(Guzzle $guzzle, Url $url, $headers = array('Accept' => 'application/vnd.twitchtv.v3+json'))
    {
        $this->headers  = $headers;
        $this->url      = $url;
        $this->guzzle   = $guzzle;
    }

    /**
     * Get url
     * @return Url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Get headers
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Get guzzle
     * @return Guzzle
     */
    public function getGuzzle()
    {
        return $this->guzzle;
    }

    /**
     * Get resource
     * @param  string $resource
     * @param  array  $headers
     * @return \Guzzle\Http\Message\Response
     */
    public function get($resource, $headers = array())
    {
        return $this->guzzle->get($resource, array_merge($this->headers, $headers));
    }
}
