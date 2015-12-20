<?php

namespace Shoko\TwitchApiBundle\Model\ValueObject;

/**
 * Link class.
 */
class Link implements \ArrayAccess
{
    /**
     * \ArrayAccess $container
     * @var array
     */
    private $container = array();

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
     * Constructor method.
     * @param string $key Link key
     * @param string $value Link hostname
     */
    public function __construct($key = null, $value = null)
    {
        $this->key = $key;
        $this->value = $value;
        $this->container = array(
          'key' => $this->key,
          'value' => $this->value
        );
    }

    /**
     * To string method.
     * @return string
     */
    public function __toString()
    {
        return '"' . $this->key . '": "' . $this->value . '"';
    }

    /**
     * {@inheritdoc}
     */
    public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function offsetExists($offset) {
        return isset($this->container[$offset]);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetUnset($offset) {
        unset($this->container[$offset]);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetGet($offset) {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
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
        $this->container['key'] = $this->key;

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
        $this->container['value'] = $this->value;

        return $this;
    }
}
