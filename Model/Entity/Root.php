<?php

namespace Shoko\TwitchApiBundle\Model\Entity;

use Shoko\TwitchApiBundle\Entity\Token;
use Shoko\TwitchApiBundle\Entity\Link;

/**
 * Root class.
 */
class Root
{
    const ENDPOINT = '/';

    /**
     * Token $token.
     * @var Token
     */
    private $token = null;

    /**
     * array Link $links.
     * @var array
     */
    private $links = array();

    /**
     * @return Root
     */
    public static function create()
    {
        return new Root;
    }

    /**
     * Get token method.
     * @return Token|null
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set token method.
     * @param Token $token
     * @return Root
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get links method.
     * @return array
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * Set links method.
     * @param array $links
     * @return Root
     */
    public function setLinks(array $links)
    {
        $this->links = $links;

        return $this;
    }
}
