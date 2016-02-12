<?php

namespace Shoko\TwitchApiBundle\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\Traits\Emailable;

/**
 * Me class.
 */
class Me extends User
{
    const ENDPOINT = 'user';

    use Emailable;

    /**
     * Partnered boolean $partnered.
     *
     * @var bool
     */
    private $partnered = false;

    /**
     * Notifications array.
     *
     * @var array
     */
    private $notifications = array();

    /**
     * @return Me
     */
    public static function create()
    {
        return new self();
    }

    /**
     * Get partnered.
     *
     * @return bool
     */
    public function isPartnered()
    {
        return $this->partnered;
    }

    /**
     * Set partnered.
     *
     * @param bool $partnered
     *
     * @return Me
     */
    public function setPartnered($partnered)
    {
        $this->partnered = $partnered;

        return $this;
    }

    /**
     * Get notifications method.
     *
     * @return array
     */
    public function getNotifications()
    {
        return $this->notifications;
    }

    /**
     * Set notifications method.
     *
     * @param array $notifications
     *
     * @return Me
     */
    public function setNotifications(array $notifications)
    {
        $this->notifications = $notifications;

        return $this;
    }
}
