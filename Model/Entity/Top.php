<?php

namespace Shoko\TwitchApiBundle\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\Traits\Linksable;
use Shoko\TwitchApiBundle\Model\Entity\Traits\Totalable;

/**
 * Top class.
 */
class Top
{
    use Linksable, Totalable;

    /**
     * Rank array $ranks.
     *
     * @var array
     */
    private $ranks = array();

    /**
     * @return Top
     */
    public static function create()
    {
        return new self();
    }

    /**
     * Get Ranks method.
     *
     * @return array
     */
    public function getRanks()
    {
        return $this->ranks;
    }

    /**
     * Set Ranks method.
     *
     * @param array $ranks
     *
     * @return Top
     */
    public function setRanks(array $ranks)
    {
        $this->ranks = $ranks;

        return $this;
    }
}
