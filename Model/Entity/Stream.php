<?php

namespace Shoko\TwitchApiBundle\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\Traits\GameTrait;
use Shoko\TwitchApiBundle\Model\Entity\Traits\DelayTrait;
use Shoko\TwitchApiBundle\Model\Entity\Traits\LinksTrait;
use Shoko\TwitchApiBundle\Model\Entity\Traits\ChannelTrait;
use Shoko\TwitchApiBundle\Model\Entity\Traits\ViewersTrait;
use Shoko\TwitchApiBundle\Model\Entity\Traits\IdTrait;

/**
 * Stream class.
 */
class Stream
{
    use IdTrait, LinksTrait, GameTrait, DelayTrait, ChannelTrait, ViewersTrait;

    /**
     * Average Fps decimal $averageFps.
     *
     * @var decimal
     */
    private $averageFps = 0;

    /**
     * Video Height integer $videoHeight.
     *
     * @var int
     */
    private $videoHeight = 0;

    /**
     * Playlist boolean $playlist.
     *
     * @var bool
     */
    private $playlist = false;

    /**
     * Creation date DateTime $createdAt.
     *
     * @var DateTime
     */
    private $createdAt = null;

    /**
     * Preview array $preview.
     *
     * @var array
     */
    private $preview = array();

    /**
     * @return Stream
     */
    public static function create()
    {
        return new self();
    }

    /**
     * Get averageFps.
     *
     * @return decimal
     */
    public function getAverageFps()
    {
        return $this->averageFps;
    }

    /**
     * Set averageFps.
     *
     * @param decimal $averageFps
     *
     * @return Stream
     */
    public function setAverageFps($averageFps)
    {
        $this->averageFps = $averageFps;

        return $this;
    }

    /**
     * Get videoHeight.
     *
     * @return int
     */
    public function getVideoHeight()
    {
        return $this->videoHeight;
    }

    /**
     * Set videoHeight.
     *
     * @param int $videoHeight
     *
     * @return Stream
     */
    public function setVideoHeight($videoHeight)
    {
        $this->videoHeight = $videoHeight;

        return $this;
    }

    /**
     * Get playlist.
     *
     * @return bool
     */
    public function isPlaylist()
    {
        return $this->playlist;
    }

    /**
     * Set playlist.
     *
     * @param bool $playlist
     *
     * @return Stream
     */
    public function setPlaylist($playlist)
    {
        $this->playlist = $playlist;

        return $this;
    }

    /**
     * Get createdAt.
     *
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set createdAt.
     *
     * @param DateTime $createdAt
     *
     * @return Stream
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get preview method.
     *
     * @return array
     */
    public function getPreview()
    {
        return $this->preview;
    }

    /**
     * Set preview method.
     *
     * @param array $preview
     *
     * @return Stream
     */
    public function setPreview(array $preview)
    {
        $this->preview = $preview;

        return $this;
    }
}
