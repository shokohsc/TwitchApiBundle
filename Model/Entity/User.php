<?php

namespace Shoko\TwitchApiBundle\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\Traits\Linksable;
use Shoko\TwitchApiBundle\Model\Entity\Traits\Identifiable;
use Shoko\TwitchApiBundle\Model\Entity\Traits\Timestampable;

/**
 * User class.
 */
class User
{
    const ENDPOINT = 'users/';

    use Identifiable, Timestampable, Linksable;

    /**
     * Type string $type
     * @var string
     */
    private $type = 'user';

    /**
     * Name string $name
     * @var string
     */
    private $name = null;

    /**
     * Logo string $logo
     * @var string
     */
    private $logo = null;

    /**
     * Display name string $displayName
     * @var string
     */
    private $displayName = null;

    /**
     * Bio string $bio
     * @var string
     */
    private $bio = null;

    /**
     * @return User
     */
    public static function create()
    {
        return new User;
    }

    /**
     * Get type
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set type
     * @param string $type
     * @return User
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get logo
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set logo
     * @param string $logo
     * @return User
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get displayName
     * @return string
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * Set displayName
     * @param string $displayName
     * @return User
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;

        return $this;
    }

    /**
     * Get bio
     * @return string
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * Set bio
     * @param string $bio
     * @return User
     */
    public function setBio($bio)
    {
        $this->bio = $bio;

        return $this;
    }
}
