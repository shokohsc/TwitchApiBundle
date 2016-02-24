<?php

namespace Shoko\TwitchApiBundle\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\Traits\Linksable;
use Shoko\TwitchApiBundle\Model\Entity\Traits\Totalable;

/**
 * FollowList class.
 */
class FollowList
{
    use Linksable, Totalable;

    /**
     * Follows array $follows.
     *
     * @var array
     */
    private $follows = array();

    /**
     * Cursor string $$cursor.
     *
     * @var string
     */
    private $cursor;

    /**
     * @return FollowList
     */
    public static function create()
    {
        return new self();
    }

    /**
     * Get follows method.
     *
     * @return array
     */
    public function getFollows()
    {
        return $this->follows;
    }

    /**
     * Set follows method.
     *
     * @param array $follows
     *
     * @return FollowList
     */
    public function setFollows(array $follows)
    {
        $this->follows = $follows;

        return $this;
    }

    /**
     * Get cursor method.
     *
     * @return string
     */
    public function getCursor()
    {
        return $this->cursor;
    }

    /**
     * Set cursor method.
     *
     * @param string $cursor
     *
     * @return FollowList
     */
    public function setCursor($cursor)
    {
        $this->cursor = $cursor;

        return $this;
    }
}
