<?php

namespace Shoko\TwitchApiBundle\Model\Entity\Traits;

/**
 * Trait LinksTrait.
 */
trait LinksTrait
{
    /**
     * Links array $links.
     *
     * @var array
     */
    private $links = array();

    /**
     * Get links method.
     *
     * @return array
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * Set links method.
     *
     * @param array $links
     */
    public function setLinks(array $links)
    {
        $this->links = $links;

        return $this;
    }
}
