<?php

namespace Shoko\TwitchApiBundle\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\Traits\Nameable;
use Shoko\TwitchApiBundle\Model\Entity\Traits\Linksable;
use Shoko\TwitchApiBundle\Model\Entity\Traits\Identifiable;

/**
 * Game class.
 */
class Game
{
    const ENDPOINT = 'games/top';

    use Identifiable, Linksable, Nameable;

    /**
     * Box array $box
     * @var array
     */
    private $box = array();

    /**
     * Logo array $logo
     * @var array
     */
    private $logo = array();

    /**
     * GiantBombId string $giantBombId
     * @var string
     */
    private $giantBombId = null;

    /**
     * @return Game
     */
    public static function create()
    {
        return new Game;
    }

    /**
     * Get box method.
     * @return array
     */
    public function getBox()
    {
        return $this->box;
    }

    /**
     * Set box method.
     * @param array $box
     * @return Game
     */
    public function setBox(array $box)
    {
        $this->box = $box;

        return $this;
    }

    /**
     * Get logo method.
     * @return array
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set logo method.
     * @param array $logo
     * @return Game
     */
    public function setLogo(array $logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get giantBombId
     * @return string
     */
    public function getGiantBombId()
    {
        return $this->giantBombId;
    }

    /**
     * Set giantBombId
     * @param string $giantBombId
     * @return Game
     */
    public function setGiantBombId($giantBombId)
    {
        $this->giantBombId = $giantBombId;

        return $this;
    }
}
