<?php

namespace Shoko\TwitchApiBundle\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\Traits\LogoTrait;
use Shoko\TwitchApiBundle\Model\Entity\Traits\GameTrait;
use Shoko\TwitchApiBundle\Model\Entity\Traits\NameTrait;
use Shoko\TwitchApiBundle\Model\Entity\Traits\LinksTrait;
use Shoko\TwitchApiBundle\Model\Entity\Traits\DelayTrait;
use Shoko\TwitchApiBundle\Model\Entity\Traits\BannerTrait;
use Shoko\TwitchApiBundle\Model\Entity\Traits\IdTrait;
use Shoko\TwitchApiBundle\Model\Entity\Traits\TimestampTrait;
use Shoko\TwitchApiBundle\Model\Entity\Traits\BackgroundTrait;
use Shoko\TwitchApiBundle\Model\Entity\Traits\DisplaynameTrait;

/**
 * Channel class.
 */
class Channel
{
    use IdTrait, TimestampTrait, LogoTrait, LinksTrait, GameTrait, NameTrait, DisplaynameTrait, DelayTrait, BannerTrait, BackgroundTrait;

    /**
     * Mature boolean $mature.
     *
     * @var bool
     */
    private $mature = false;

    /**
     * Status string $status.
     *
     * @var string
     */
    private $status = null;

    /**
     * Broadcaster language string $broadcasterLanguage.
     *
     * @var string
     */
    private $broadcasterLanguage = null;

    /**
     * Language string $language.
     *
     * @var string
     */
    private $language = null;

    /**
     * Video banner string $videoBanner.
     *
     * @var string
     */
    private $videoBanner = null;

    /**
     * Profile banner string $profileBanner.
     *
     * @var string
     */
    private $profileBanner = null;

    /**
     * Profile banner background color string $profileBannerBackgroundColor.
     *
     * @var string
     */
    private $profileBannerBackgroundColor = null;

    /**
     * Partner string $partner.
     *
     * @var string
     */
    private $partner = false;

    /**
     * Url string $url.
     *
     * @var string
     */
    private $url = null;

    /**
     * Views integer $views.
     *
     * @var int
     */
    private $views = 0;

    /**
     * Followers integer $followers.
     *
     * @var int
     */
    private $followers = 0;

    /**
     * @return Channel
     */
    public static function create()
    {
        return new self();
    }

    /**
     * Is mature method.
     *
     * @return true|false
     */
    public function isMature()
    {
        return $this->mature;
    }

    /**
     * Set mature method.
     *
     * @param bool $mature
     *
     * @return Channel
     */
    public function setMature($mature)
    {
        $this->mature = $mature;

        return $this;
    }

    /**
     * Get status method.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set status method.
     *
     * @param string $status
     *
     * @return Channel
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get broadcasterLanguage method.
     *
     * @return string
     */
    public function getBroadcasterLanguage()
    {
        return $this->broadcasterLanguage;
    }

    /**
     * Set broadcasterLanguage method.
     *
     * @param string $broadcasterLanguage
     *
     * @return Channel
     */
    public function setBroadcasterLanguage($broadcasterLanguage)
    {
        $this->broadcasterLanguage = $broadcasterLanguage;

        return $this;
    }

    /**
     * Get language.
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set language.
     *
     * @param string $language
     *
     * @return Channel
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get videoBanner.
     *
     * @return string
     */
    public function getVideoBanner()
    {
        return $this->videoBanner;
    }

    /**
     * Set videoBanner.
     *
     * @param string $videoBanner
     *
     * @return Channel
     */
    public function setVideoBanner($videoBanner)
    {
        $this->videoBanner = $videoBanner;

        return $this;
    }

    /**
     * Get profileBanner.
     *
     * @return string
     */
    public function getProfileBanner()
    {
        return $this->profileBanner;
    }

    /**
     * Set profileBanner.
     *
     * @param string $profileBanner
     *
     * @return Channel
     */
    public function setProfileBanner($profileBanner)
    {
        $this->profileBanner = $profileBanner;

        return $this;
    }

    /**
     * Get profileBannerBackgroundColor.
     *
     * @return string
     */
    public function getProfileBannerBackgroundColor()
    {
        return $this->profileBannerBackgroundColor;
    }

    /**
     * Set profileBannerBackgroundColor.
     *
     * @param string $profileBannerBackgroundColor
     *
     * @return Channel
     */
    public function setProfileBannerBackgroundColor($profileBannerBackgroundColor)
    {
        $this->profileBannerBackgroundColor = $profileBannerBackgroundColor;

        return $this;
    }

    /**
     * Is partner method.
     *
     * @return true|false
     */
    public function isPartner()
    {
        return $this->partner;
    }

    /**
     * Set partner method.
     *
     * @param bool $partner
     *
     * @return Channel
     */
    public function setPartner($partner)
    {
        $this->partner = $partner;

        return $this;
    }

    /**
     * Get url.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set url.
     *
     * @param string $url
     *
     * @return Channel
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get views.
     *
     * @return int
     */
    public function getViews()
    {
        return $this->views;
    }

    /**
     * Set views.
     *
     * @param int $views
     *
     * @return Channel
     */
    public function setViews($views)
    {
        $this->views = $views;

        return $this;
    }

    /**
     * Get followers.
     *
     * @return int
     */
    public function getFollowers()
    {
        return $this->followers;
    }

    /**
     * Set followers.
     *
     * @param int $followers
     *
     * @return Channel
     */
    public function setFollowers($followers)
    {
        $this->followers = $followers;

        return $this;
    }
}
