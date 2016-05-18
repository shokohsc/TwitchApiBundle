<?php

namespace Shoko\TwitchApiBundle\Model\Entity\Traits;

/**
 * Trait LogoTrait.
 */
trait LogoTrait
{
    /**
     * Logo string $logo.
     *
     * @var string
     */
    private $logo = null;

    /**
     * Get logo.
     *
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set logo.
     *
     * @param string $logo
     */
    public function setLogo(string $logo)
    {
        $this->logo = $logo;

        return $this;
    }
}
