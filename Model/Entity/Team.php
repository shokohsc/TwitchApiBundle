<?php

namespace Shoko\TwitchApiBundle\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\Traits\Logoable;
use Shoko\TwitchApiBundle\Model\Entity\Traits\Nameable;
use Shoko\TwitchApiBundle\Model\Entity\Traits\Linksable;
use Shoko\TwitchApiBundle\Model\Entity\Traits\Bannerable;
use Shoko\TwitchApiBundle\Model\Entity\Traits\Identifiable;
use Shoko\TwitchApiBundle\Model\Entity\Traits\Timestampable;
use Shoko\TwitchApiBundle\Model\Entity\Traits\Backgroundable;
use Shoko\TwitchApiBundle\Model\Entity\Traits\Displaynameable;

/**
 * Team class.
 */
class Team
{
    const ENDPOINT = 'teams/';

    use Identifiable, Timestampable, Logoable, Linksable, Nameable, Displaynameable, Bannerable, Backgroundable;

    /**
     * Info string $info.
     * @var string
     */
    private $info = null;

    /**
     * @return Team
     */
    public static function create()
    {
        return new Team;
    }

    /**
     * Get info method.
     * @return string
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Set info method.
     * @param string $info
     * @return Team
     */
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }
}
