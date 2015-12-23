<?php

namespace Shoko\TwitchApiBundle\Tests\Model\Entity\ValueObject;

use Shoko\TwitchApiBundle\Model\Entity\ValueObject\Link;
use Shoko\TwitchApiBundle\Model\Entity\User;

/**
 * LinkTest class.
 */
class LinkTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test __toString method.
     */
    public function testToString()
    {
        $link = new Link();
        $this->assertEquals('"": ""', strval($link));

        $link
          ->setKey(User::ENDPOINT)
          ->setValue('some_user')
        ;
        $this->assertEquals('"user": "some_user"', strval($link));
    }

    public function testGettersAndSetters()
    {
        $link = new Link();
        $this->assertEquals(null, $link->getKey());
        $this->assertEquals(null, $link->getValue());

        $link
          ->setKey(User::ENDPOINT)
          ->setValue('some_user')
        ;
        $this->assertEquals(User::ENDPOINT, $link->getKey());
        $this->assertEquals('some_user', $link->getValue());
    }

    /**
     * Test array access interface method.
     */
    public function testArrayAccessInterface()
    {
        $link = (new Link())
          ->setKey(User::ENDPOINT)
          ->setValue('some_user')
        ;

        $this->assertEquals(User::ENDPOINT, $link['key']);
        $this->assertEquals('some_user', $link['value']);
    }
}
