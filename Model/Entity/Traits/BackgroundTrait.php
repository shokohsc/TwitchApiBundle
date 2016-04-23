<?php

namespace Shoko\TwitchApiBundle\Model\Entity\Traits;

/**
 * Trait BackgroundTrait.
 */
trait BackgroundTrait
{
    /**
     * Background string $background.
     *
     * @var string
     */
    private $background = null;

    /**
     * Get background.
     *
     * @return string
     */
    public function getBackground()
    {
        return $this->background;
    }

    /**
     * Set background.
     *
     * @param string $background
     */
    public function setBackground($background)
    {
        $this->background = $background;

        return $this;
    }
}
