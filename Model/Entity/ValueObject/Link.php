<?php

namespace Shoko\TwitchApiBundle\Model\Entity\ValueObject;

/**
 * Link class.
 */
class Link
{
    /**
     * Link $key
     * @var string
     */
    private $key;

    /**
     * Link $hostname
     * @var string
     */
    private $value;

    /**
     * @return Link
     */
    public static function create()
    {
        return new Link();
    }

    /**
     * To string method.
     * @return string
     */
    public function __toString()
    {
        return json_encode([
          $this->key => $this->value
        ]);
    }

    /**
     * Get key
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set key
     * @param string $key
     * @return Link
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get value
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set value
     * @param string $value
     * @return Link
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
