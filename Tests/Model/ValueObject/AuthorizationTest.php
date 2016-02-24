<?php

namespace Shoko\TwitchApiBundle\Tests\Model\ValueObject;

use Shoko\TwitchApiBundle\Model\ValueObject\Authorization;

/**
 * AuthorizationTest class.
 */
class AuthorizationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test create method.
     */
    public function testCreate()
    {
        $authorization = Authorization::create();

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\ValueObject\Authorization', $authorization);
    }

    public function testGettersAndSetters()
    {
        $authorization = Authorization::create();
        $this->assertEquals(array(), $authorization->getScopes());
        $this->assertEquals(null, $authorization->getCreatedAt());
        $this->assertEquals(null, $authorization->getUpdatedAt());

        $date = new \DateTime();

        $authorization
          ->setScopes(array('some_scope'))
          ->setCreatedAt($date)
          ->setUpdatedAt($date)
        ;
        $this->assertEquals(array('some_scope'), $authorization->getScopes());
        $this->assertEquals($date, $authorization->getCreatedAt());
        $this->assertEquals($date, $authorization->getUpdatedAt());
    }
}
