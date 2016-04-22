<?php

namespace Shoko\TwitchApiBundle\Lib;

use GuzzleHttp\Client as Guzzle;

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
     * @param string|null $clientId
     * @param Guzzle|bool $guzzle
     */
    public function __construct($clientId = null, $guzzle = false)
    {
        $this->guzzle = $guzzle ? $guzzle : new Guzzle();
        $this->url = self::URL_PROTOCOL.'://'.self::URL_HOST.'/'.self::URL_VERSION.'/';
        $this->headers = $clientId ? array(
          'Accept' => 'application/vnd.twitchtv.v3+json',
          'Client-ID' => $clientId,
        ) : array(
          'Accept' => 'application/vnd.twitchtv.v3+json',
        );
    }

    /**
     * Get default twitch v3 api url.
     *
     * @return Url
     */
    public function getUrl()
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
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get headers.
     *
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Set headers.
     *
     * @param array $headers
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * Get guzzle.
     *
     * @return Guzzle
     */
    public function getGuzzle()
    {
        return $this->guzzle;
    }

    /**
     * Set guzzle $guzzle.
     *
     * @return Client
     */
    public function setGuzzle(Guzzle $guzzle)
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
     * @return \Guzzle\Http\Message\Response
     */
    public function get($resource, $headers = array())
    {
        return $this->getGuzzle()->request(
          'GET',
          $this->getUrl().$resource,
          ['headers' => array_merge($this->getHeaders(), $headers)]
        );
    }
}
