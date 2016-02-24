<?php

namespace Shoko\TwitchApiBundle\Model\ValueObject;

/**
 * Token class.
 */
class Token
{
    /**
     * Token $authorization.
     *
     * @var Authorization
     */
    private $authorization = null;

    /**
     * string $userName.
     *
     * @var string
     */
    private $userName = null;

    /**
     * string $valid.
     *
     * @var bool
     */
    private $valid = false;

    /**
     * @return Token
     */
    public static function create()
    {
        return new self();
    }

    /**
     * Get authorization.
     *
     * @return Authorization
     */
    public function getAuthorization()
    {
        return $this->authorization;
    }

    /**
     * Set authorization.
     *
     * @param Authorization $authorization
     *
     * @return Token
     */
    public function setAuthorization(Authorization $authorization)
    {
        $this->authorization = $authorization;

        return $this;
    }

    /**
     * Get userName.
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set userName.
     *
     * @param string $userName
     *
     * @return Token
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Get valid.
     *
     * @return bool
     */
    public function isValid()
    {
        return $this->valid;
    }

    /**
     * Set valid.
     *
     * @param bool $valid
     *
     * @return Token
     */
    public function setValid($valid)
    {
        $this->valid = $valid;

        return $this;
    }
}
