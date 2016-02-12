<?php

namespace Shoko\TwitchApiBundle\Model\Entity\Traits;

/**
 * Trait Nameable.
 */
trait Nameable
{
    /**
     * Name string $name.
     *
     * @var string
     */
    private $name = null;

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name.
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
