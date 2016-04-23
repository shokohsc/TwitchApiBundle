<?php

namespace Shoko\TwitchApiBundle\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\Traits\LinksTrait;
use Shoko\TwitchApiBundle\Model\Entity\Traits\ChannelTrait;

/**
 * Follow class.
 */
class Follow
{
    use LinksTrait, ChannelTrait;

    /**
     * Notifications boolean $notifications.
     *
     * @var bool
     */
    private $notifications = false;

    /**
     * Creation date DateTime $createdAt.
     *
     * @var DateTime
     */
    private $createdAt = null;

    /**
     * @return Follow
     */
    public static function create()
    {
        return new self();
    }

    /**
     * Is notifications method.
     *
     * @return true|false
     */
    public function isNotifications()
    {
        return $this->notifications;
    }

    /**
     * Set notifications method.
     *
     * @param bool $notifications
     *
     * @return Follow
     */
    public function setNotifications($notifications)
    {
        $this->notifications = $notifications;

        return $this;
    }

    /**
     * Get createdAt.
     *
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set createdAt.
     *
     * @param DateTime $createdAt
     *
     * @return Follow
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
