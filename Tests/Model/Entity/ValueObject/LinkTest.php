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
     * Test create method.
     */
    public function testCreate()
    {
        $link = Link::create();

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\ValueObject\Link', $link);
    }

    /**
     * Test __toString method.
     */
    public function testToString()
    {
        $link = Link::create();
        $this->assertEquals('{"":null}', strval($link));

        $link
          ->setKey(User::ENDPOINT)
          ->setValue('some_user')
        ;
        $this->assertEquals('{"users":"some_user"}', strval($link));
    }

    public function testGettersAndSetters()
    {
        $link = Link::create();
        $this->assertEquals(null, $link->getKey());
        $this->assertEquals(null, $link->getValue());

        $link
          ->setKey(User::ENDPOINT)
          ->setValue('some_user')
        ;
        $this->assertEquals(User::ENDPOINT, $link->getKey());
        $this->assertEquals('some_user', $link->getValue());
    }
}
