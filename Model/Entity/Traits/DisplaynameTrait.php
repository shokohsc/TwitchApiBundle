<?php

namespace Shoko\TwitchApiBundle\Model\Entity\Traits;

/**
 * Trait DisplaynameTrait.
 */
trait DisplaynameTrait
{
    /**
     * DisplayName string $displayName.
     *
     * @var string
     */
    private $displayName = null;

    /**
     * Get displayName.
     *
     * @return string
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * Set displayName.
     *
     * @param string $displayName
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;

        return $this;
    }
}
