<?php

namespace Shoko\TwitchApiBundle\Model\Entity;

/**
 * User class.
 */
class User
{
    const ENDPOINT = 'users';

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
     * Creation date DateTime $createdAt
     * @var DateTime
     */
    private $createdAt = null;

    /**
     * Update date DateTime $updatedAt
     * @var DateTime
     */
    private $updatedAt = null;

    /**
     * Links array
     * @var array
     */
    private $links = array();

    /**
     * Logo string $logo
     * @var string
     */
    private $logo = null;

    /**
     * Id string $id
     * @var string
     */
    private $id = null;

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
     * @return User
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get updatedAt
     * @return DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set updatedAt
     * @param DateTime $updatedAt
     * @return User
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get links method.
     * @return array
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * Set links method.
     * @param array $links
     * @return User
     */
    public function setLinks(array $links)
    {
        $this->links = $links;

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
     * Get id
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id
     * @param string $id
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;

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
