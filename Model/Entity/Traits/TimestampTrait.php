<?php

namespace Shoko\TwitchApiBundle\Model\Entity\Traits;

/**
 * Trait TimestampTrait.
 */
trait TimestampTrait
{
    /**
     * Creation date DateTime $createdAt.
     *
     * @var DateTime
     */
    private $createdAt = null;

    /**
     * Update date DateTime $updatedAt.
     *
     * @var DateTime
     */
    private $updatedAt = null;

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
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get updatedAt.
     *
     * @return DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set updatedAt.
     *
     * @param DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
