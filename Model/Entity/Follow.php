<?php

namespace Shoko\TwitchApiBundle\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\Traits\Linksable;
use Shoko\TwitchApiBundle\Model\Entity\Traits\Channelable;

/**
 * Follow class.
 */
class Follow
{
    use Linksable, Channelable;

    /**
     * Notifications boolean $notifications.
     * @var boolean
     */
    private $notifications = false;

    /**
     * Creation date DateTime $createdAt
     * @var DateTime
     */
    private $createdAt = null;

    /**
     * @return Follow
     */
    public static function create()
    {
        return new Follow;
    }

    /**
     * Is notifications method.
     * @return true|false
     */
    public function isNotifications()
    {
        return $this->notifications;
    }

    /**
     * Set notifications method.
     * @param boolean $notifications
     * @return Follow
     */
    public function setNotifications($notifications)
    {
        $this->notifications = $notifications;

        return $this;
    }

    /**
     * Get createdAt
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set createdAt
     * @param DateTime $createdAt
     * @return Follow
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
