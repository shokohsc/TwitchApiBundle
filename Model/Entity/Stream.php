<?php

namespace Shoko\TwitchApiBundle\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\Traits\Gameable;
use Shoko\TwitchApiBundle\Model\Entity\Traits\Delayable;
use Shoko\TwitchApiBundle\Model\Entity\Traits\Linksable;
use Shoko\TwitchApiBundle\Model\Entity\Traits\Identifiable;
use Shoko\TwitchApiBundle\Model\Entity\Channel;

/**
 * Stream class.
 */
class Stream
{
    const ENDPOINT = 'streams/';

    use Identifiable, Linksable, Gameable, Delayable;

    /**
     * Viewers integer $viewers
     * @var integer
     */
    private $viewers = 0;

    /**
     * Average Fps decimal $averageFps
     * @var decimal
     */
    private $averageFps = 0;

    /**
     * Video Height integer $videoHeight
     * @var integer
     */
    private $videoHeight = 0;

    /**
     * Playlist boolean $playlist
     * @var boolean
     */
    private $playlist = false;

    /**
     * Creation date DateTime $createdAt
     * @var DateTime
     */
    private $createdAt = null;

    /**
     * Channel $channel
     * @var Channel
     */
    private $channel = null;

    /**
     * Preview array $preview
     * @var array
     */
    private $preview = array();

    /**
     * @return Stream
     */
    public static function create()
    {
        return new Stream;
    }

    /**
     * Get viewers
     * @return integer
     */
    public function getViewers()
    {
        return $this->viewers;
    }

    /**
     * Set viewers
     * @param integer $viewers
     * @return Stream
     */
    public function setViewers($viewers)
    {
        $this->viewers = $viewers;

        return $this;
    }

    /**
     * Get averageFps
     * @return decimal
     */
    public function getAverageFps()
    {
        return $this->averageFps;
    }

    /**
     * Set averageFps
     * @param decimal $averageFps
     * @return Stream
     */
    public function setAverageFps($averageFps)
    {
        $this->averageFps = $averageFps;

        return $this;
    }

    /**
     * Get videoHeight
     * @return integer
     */
    public function getVideoHeight()
    {
        return $this->videoHeight;
    }

    /**
     * Set videoHeight
     * @param integer $videoHeight
     * @return Stream
     */
    public function setVideoHeight($videoHeight)
    {
        $this->videoHeight = $videoHeight;

        return $this;
    }

    /**
     * Get playlist
     * @return boolean
     */
    public function isPlaylist()
    {
        return $this->playlist;
    }

    /**
     * Set playlist
     * @param boolean $playlist
     * @return Stream
     */
    public function setPlaylist($playlist)
    {
        $this->playlist = $playlist;

        return $this;
    }

    /**
     * Get createdAt
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set createdAt
     * @param DateTime $createdAt
     * @return Stream
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get channel
     * @return Channel
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * Set channel
     * @param Channel $channel
     * @return Stream
     */
    public function setChannel(Channel $channel)
    {
        $this->channel = $channel;

        return $this;
    }

    /**
     * Get preview method.
     * @return array
     */
    public function getPreview()
    {
        return $this->preview;
    }

    /**
     * Set preview method.
     * @param array $preview
     * @return Stream
     */
    public function setPreview(array $preview)
    {
        $this->preview = $preview;

        return $this;
    }
}
