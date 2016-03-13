<?php

namespace Shoko\TwitchApiBundle\Model\Entity;

/**
 * ChannelToken class.
 */
class ChannelToken
{
    /**
     * Token string $token.
     *
     * @var string
     */
    private $token;

    /**
     * Signature string $sig.
     *
     * @var string
     */
    private $sig;

    /**
     * Mobile restricted bool $mobileRestricted.
     *
     * @var bool
     */
    private $mobileRestricted = false;

    /**
     * @return ChannelToken
     */
    public static function create()
    {
        return new self();
    }

    /**
     * Get token method.
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set token method.
     *
     * @param string $token
     *
     * @return ChannelToken
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get sig method.
     *
     * @return string
     */
    public function getSig()
    {
        return $this->sig;
    }

    /**
     * Set sig method.
     *
     * @param string $sig
     *
     * @return ChannelToken
     */
    public function setSig($sig)
    {
        $this->sig = $sig;

        return $this;
    }

    /**
     * Get mobileRestricted method.
     *
     * @return bool
     */
    public function isMobileRestricted()
    {
        return $this->mobileRestricted;
    }

    /**
     * Set mobileRestricted method.
     *
     * @param bool $mobileRestricted
     *
     * @return ChannelToken
     */
    public function setMobileRestricted($mobileRestricted)
    {
        $this->mobileRestricted = $mobileRestricted;

        return $this;
    }
}
