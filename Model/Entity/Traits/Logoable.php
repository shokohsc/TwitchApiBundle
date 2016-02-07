<?php

namespace Shoko\TwitchApiBundle\Model\Entity\Traits;

/**
 * Trait Logoable
 */
trait Logoable
{
    /**
     * Logo string $logo
     * @var string
     */
    private $logo = null;

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
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }
}
