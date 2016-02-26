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
     * Tops array $tops.
     *
     * @var array
     */
    private $tops = array();

    /**
     * @return Top
     */
    public static function create()
    {
        return new self();
    }

    /**
     * Get Tops method.
     *
     * @return array
     */
    public function getTops()
    {
        return $this->tops;
    }

    /**
     * Set Tops method.
     *
     * @param array $tops
     *
     * @return Top
     */
    public function setTops(array $tops)
    {
        $this->tops = $tops;

        return $this;
    }
}
