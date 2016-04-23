<?php

namespace Shoko\TwitchApiBundle\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\Traits\LogoTrait;
use Shoko\TwitchApiBundle\Model\Entity\Traits\NameTrait;
use Shoko\TwitchApiBundle\Model\Entity\Traits\LinksTrait;
use Shoko\TwitchApiBundle\Model\Entity\Traits\BannerTrait;
use Shoko\TwitchApiBundle\Model\Entity\Traits\IdTrait;
use Shoko\TwitchApiBundle\Model\Entity\Traits\TimestampTrait;
use Shoko\TwitchApiBundle\Model\Entity\Traits\BackgroundTrait;
use Shoko\TwitchApiBundle\Model\Entity\Traits\DisplaynameTrait;

/**
 * Team class.
 */
class Team
{
    use IdTrait, TimestampTrait, LogoTrait, LinksTrait, NameTrait, DisplaynameTrait, BannerTrait, BackgroundTrait;

    /**
     * Info string $info.
     *
     * @var string
     */
    private $info = null;

    /**
     * @return Team
     */
    public static function create()
    {
        return new self();
    }

    /**
     * Get info method.
     *
     * @return string
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Set info method.
     *
     * @param string $info
     *
     * @return Team
     */
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }
}
