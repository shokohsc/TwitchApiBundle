<?php

namespace Shoko\TwitchApiBundle\Tests\Model\Entity\ValueObject;

use Shoko\TwitchApiBundle\Model\Entity\ValueObject\Authorization;
use Prophecy\Prophet;

/**
 * AuthorizationTest class.
 */
class AuthorizationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Prophet $prophet
     * @var Prophet
     */
    private $prophet;

    /**
     * Test create method.
     */
    public function testCreate()
    {
        $authorization = Authorization::create();

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\ValueObject\Authorization', $authorization);
    }

    public function testGettersAndSetters()
    {
        $this->prophet = new Prophet;

        $authorization = Authorization::create();
        $this->assertEquals(array(), $authorization->getScopes());
        $this->assertEquals(null, $authorization->getCreatedAt());
        $this->assertEquals(null, $authorization->getUpdatedAt());

        $date = new \DateTime;

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
