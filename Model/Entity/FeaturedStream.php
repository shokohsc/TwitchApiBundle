<?php

namespace Shoko\TwitchApiBundle\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\Stream;

/**
 * FeaturedStream class.
 */
class FeaturedStream
{
    /**
     * Image string $image.
     *
     * @var string
     */
    private $image;

    /**
     * Text string $text.
     *
     * @var string
     */
    private $text;

    /**
     * Title string $title.
     *
     * @var string
     */
    private $title;

    /**
     * Scheduled bool $scheduled.
     *
     * @var bool
     */
    private $scheduled = false;

    /**
     * Sponsored bool $sponsored.
     *
     * @var bool
     */
    private $sponsored = false;

    /**
     * Stream $stream.
     *
     * @var Stream
     */
    private $stream;

    /**
     * @return FeaturedStream
     */
    public static function create()
    {
        return new self();
    }

    /**
     * Get Image method.
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set Image method.
     *
     * @param string $image
     *
     * @return FeaturedStream
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get Text method.
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set Text method.
     *
     * @param string $text
     *
     * @return FeaturedStream
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get Title method.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set Title method.
     *
     * @param string $title
     *
     * @return FeaturedStream
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get Sponsored method.
     *
     * @return bool
     */
    public function isSponsored()
    {
        return $this->sponsored;
    }

    /**
     * Set Sponsored method.
     *
     * @param bool $sponsored
     *
     * @return FeaturedStream
     */
    public function setSponsored($sponsored)
    {
        $this->sponsored = $sponsored;

        return $this;
    }

    /**
     * Get Scheduled method.
     *
     * @return bool
     */
    public function isScheduled()
    {
        return $this->scheduled;
    }

    /**
     * Set Scheduled method.
     *
     * @param bool $scheduled
     *
     * @return FeaturedStream
     */
    public function setScheduled($scheduled)
    {
        $this->scheduled = $scheduled;

        return $this;
    }

    /**
     * Get Stream method.
     *
     * @return Stream
     */
    public function getStream()
    {
        return $this->stream;
    }

    /**
     * Set Stream method.
     *
     * @param Stream $stream
     *
     * @return FeaturedStream
     */
    public function setStream(Stream $stream)
    {
        $this->stream = $stream;

        return $this;
    }
}
