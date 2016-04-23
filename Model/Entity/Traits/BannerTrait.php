<?php

namespace Shoko\TwitchApiBundle\Model\Entity\Traits;

/**
 * Trait BannerTrait.
 */
trait BannerTrait
{
    /**
     * Banner string $banner.
     *
     * @var string
     */
    private $banner = null;

    /**
     * Get banner.
     *
     * @return string
     */
    public function getBanner()
    {
        return $this->banner;
    }

    /**
     * Set banner.
     *
     * @param string $banner
     */
    public function setBanner($banner)
    {
        $this->banner = $banner;

        return $this;
    }
}
