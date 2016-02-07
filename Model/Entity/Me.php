<?php

namespace Shoko\TwitchApiBundle\Model\Entity;
use Shoko\TwitchApiBundle\Model\Entity\User;

/**
 * Me class.
 */
class Me extends User
{
    const ENDPOINT = 'user';

    /**
     * Email string $email
     * @var string
     */
    private $email = null;

    /**
     * Partnered boolean $partnered
     * @var boolean
     */
    private $partnered = false;

    /**
     * Notifications array
     * @var array
     */
    private $notifications = array();

    /**
     * @return Me
     */
    public static function create()
    {
        return new Me;
    }

    /**
     * Get email
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set email
     * @param string $email
     * @return Me
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get partnered
     * @return boolean
     */
    public function isPartnered()
    {
        return $this->partnered;
    }

    /**
     * Set partnered
     * @param boolean $partnered
     * @return Me
     */
    public function setPartnered($partnered)
    {
        $this->partnered = $partnered;

        return $this;
    }

    /**
     * Get notifications method.
     * @return array
     */
    public function getNotifications()
    {
        return $this->notifications;
    }

    /**
     * Set notifications method.
     * @param array $notifications
     * @return Me
     */
    public function setNotifications(array $notifications)
    {
        $this->notifications = $notifications;

        return $this;
    }
}
