<?php

namespace Shoko\TwitchApiBundle\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\Traits\Linksable;
use Shoko\TwitchApiBundle\Model\Entity\ValueObject\Token;

/**
 * Root class.
 */
class Root
{
    const ENDPOINT = '';

    use Linksable;

    /**
     * Token $token.
     * @var Token
     */
    private $token = null;

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
    public function setToken(Token $token)
    {
        $this->token = $token;

        return $this;
    }
}
