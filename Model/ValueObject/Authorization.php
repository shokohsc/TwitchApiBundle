<?php

namespace Shoko\TwitchApiBundle\Model\ValueObject;

/**
 * Authorization class.
 */
class Authorization
{
    /**
     * array $scopes.
     *
     * @var array
     */
    private $scopes = array();

    /**
     * DateTime $createdAt.
     *
     * @var DateTime
     */
    private $createdAt = null;

    /**
     * DateTime $updatedAt.
     *
     * @var DateTime
     */
    private $updatedAt = null;

    /**
     * @return Authorization
     */
    public static function create()
    {
        return new self();
    }

    /**
     * Get scopes.
     *
     * @return array
     */
    public function getScopes()
    {
        return $this->scopes;
    }

    /**
     * Set scopes.
     *
     * @param array $scopes
     *
     * @return Authorization
     */
    public function setScopes(array $scopes)
    {
        $this->scopes = $scopes;

        return $this;
    }

    /**
     * Get createdAt.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set createdAt.
     *
     * @param \DateTime $createdAt
     *
     * @return Authorization
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get updatedAt.
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set updatedAt.
     *
     * @param \DateTime $updatedAt
     *
     * @return Authorization
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
