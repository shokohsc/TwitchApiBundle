<?php

namespace Shoko\TwitchApiBundle\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\Traits\LogoTrait;
use Shoko\TwitchApiBundle\Model\Entity\Traits\NameTrait;
use Shoko\TwitchApiBundle\Model\Entity\Traits\LinksTrait;
use Shoko\TwitchApiBundle\Model\Entity\Traits\IdTrait;
use Shoko\TwitchApiBundle\Model\Entity\Traits\TimestampTrait;
use Shoko\TwitchApiBundle\Model\Entity\Traits\DisplaynameTrait;

/**
 * User class.
 */
class User
{
    use IdTrait, TimestampTrait, LinksTrait, LogoTrait, NameTrait, DisplaynameTrait;

    /**
     * Type string $type.
     *
     * @var string
     */
    private $type = 'user';

    /**
     * Bio string $bio.
     *
     * @var string
     */
    private $bio = null;

    /**
     * @return User
     */
    public static function create()
    {
        return new self();
    }

    /**
     * Get type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set type.
     *
     * @param string $type
     *
     * @return User
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get bio.
     *
     * @return string
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * Set bio.
     *
     * @param string $bio
     *
     * @return User
     */
    public function setBio($bio)
    {
        $this->bio = $bio;

        return $this;
    }
}
