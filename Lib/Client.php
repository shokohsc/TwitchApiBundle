<?php

namespace Shoko\TwitchApiBundle\Lib;

use GuzzleHttp\Client as Guzzle;
use Psr\Http\Message\ResponseInterface;

/**
 * Client class.
 */
class Client
{
    /**
     * Url $protocol: https.
     */
    const URL_PROTOCOL = 'https';

    /**
     * Url $hostname: api.twitch.tv.
     */
    const URL_HOST = 'api.twitch.tv';

    /**
     * Url $version, Twitch api version: v3 - kraken.
     */
    const URL_VERSION = 'kraken';

    /**
     * Url old version, Twitch api old version: api.
     */
    const URL_OLD_VERSION = 'api';

    /**
     * Guzzle $guzzle.
     *
     * @var Guzzle
     */
    private $guzzle = null;

    /**
     * Headers $headers.
     *
     * @var array
     */
    private $headers = array();

    /**
     * Url string $url.
     *
     * @var string
     */
    private $url;

    /**
     * Constructor method.
     *
     * @param null|string $clientId
     * @param false|Guzzle $guzzle
     */
    public function __construct($clientId = null, $guzzle = false)
    {
        $this->guzzle = $guzzle ? $guzzle : new Guzzle();
        $this->url = self::URL_PROTOCOL.'://'.self::URL_HOST.'/'.self::URL_VERSION.'/';
        $this->headers = null !== $clientId ? array(
          'Accept' => 'application/vnd.twitchtv.v3+json',
          'Client-ID' => $clientId,
        ) : array(
          'Accept' => 'application/vnd.twitchtv.v3+json',
        );
    }

    /**
     * Get default twitch v3 api url.
     *
     * @return string
     */
    public function getUrl() : string
    {
        return $this->url;
    }

    /**
     * Set url $url.
     *
     * @param string $url
     *
     * @return Client
     */
    public function setUrl(string $url) : Client
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get headers.
     *
     * @return array
     */
    public function getHeaders() : array
    {
        return $this->headers;
    }

    /**
     * Set headers.
     *
     * @param array $headers
     *
     * @return Client
     */
    public function setHeaders(array $headers) : Client
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * Get guzzle.
     *
     * @return Guzzle
     */
    public function getGuzzle() : Guzzle
    {
        return $this->guzzle;
    }

    /**
     * Set guzzle $guzzle.
     *
     * @param Guzzle $guzzle
     *
     * @return Client
     */
    public function setGuzzle(Guzzle $guzzle) : Client
    {
        $this->guzzle = $guzzle;

        return $this;
    }

    /**
     * Get resource.
     *
     * @param string $resource
     * @param array  $headers
     *
     * @return ResponseInterface
     */
    public function get(string $resource, $headers = array()) : ResponseInterface
    {
        return $this->getGuzzle()->request(
          'GET',
          $this->getUrl().$resource,
          ['headers' => array_merge($this->getHeaders(), $headers)]
        );
    }
}
