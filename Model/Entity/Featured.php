<?php

namespace Shoko\TwitchApiBundle\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\Traits\LinksTrait;

/**
 * Featured class.
 */
class Featured
{
    use LinksTrait;

    /**
     * Featured array $featureds.
     *
     * @var array
     */
    private $featureds = array();

    /**
     * @return Featured
     */
    public static function create()
    {
        return new self();
    }

    /**
     * Get Featureds method.
     *
     * @return array
     */
    public function getFeatureds()
    {
        return $this->featureds;
    }

    /**
     * Set Featureds method.
     *
     * @param array $featureds
     *
     * @return Featured
     */
    public function setFeatureds(array $featureds)
    {
        $this->featureds = $featureds;

        return $this;
    }
}
