<?php

namespace Shoko\TwitchApiBundle\Model\Entity\Traits;

/**
 * Trait IdTrait.
 */
trait IdTrait
{
    /**
     * Id string $id.
     *
     * @var string
     */
    private $id = null;

    /**
     * Get id.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id.
     *
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
