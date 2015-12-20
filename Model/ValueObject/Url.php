<?php

namespace Shoko\TwitchApiBundle\Model\ValueObject;

/**
 * Url class.
 */
class Url
{
    /**
     * Url $protocol, defaults to https
     * @var string
     */
    private $protocol;

    /**
     * Url $hostname, defaults to api.twitch.tv
     * @var string
     */
    private $hostName;

    /**
     * Url $version, Twitch api version, defaults to v3 - kraken
     * @var string
     */
    private $version;

    /**
     * Constructor method.
     * @param string $protocol Url protocol, defaults to https
     * @param string $hostName Url hostname, defaults to api.twitch.tv
     * @param string $version  Twitch api version, defaults to kraken
     */
    public function __construct($protocol = 'https', $hostName = 'api.twitch.tv', $version = 'kraken')
    {
        $this->protocol = $protocol;
        $this->hostName = $hostName;
        $this->version  = $version;
    }

    /**
     * To string method.
     * @return string
     */
    public function __toString()
    {
        return $this->protocol . '://' . $this->hostName . '/' . $this->version;
    }
}
