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
     * Guzzle $guzzle.
     *
     * @var Guzzle
     */
    private $guzzle = null;

    /**
     * Constructor method.
     *
     * @param Guzzle|bool $guzzle
     */
    public function __construct($guzzle = false)
    {
        $this->guzzle = $guzzle ? $guzzle : new Guzzle();
    }

    /**
     * Get default twitch v3 api url.
     *
     * @return Url
     */
    public function getUrl()
    {
        return self::URL_PROTOCOL.'://'.self::URL_HOST.'/'.self::URL_VERSION.'/';
    }

    /**
     * Get default headers to send.
     *
     * @return array
     */
    public function getDefaultHeaders()
    {
        return array('Accept' => 'application/vnd.twitchtv.v3+json');
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
          array_merge($this->getDefaultHeaders(), $headers)
        );
    }
}
