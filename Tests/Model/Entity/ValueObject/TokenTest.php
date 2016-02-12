<?php

namespace Shoko\TwitchApiBundle\Tests\Model\Entity\ValueObject;

use Shoko\TwitchApiBundle\Model\Entity\ValueObject\Token;
use Prophecy\Prophet;

/**
 * TokenTest class.
 */
class TokenTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Prophet $prophet.
     *
     * @var Prophet
     */
    private $prophet;

    /**
     * Test create method.
     */
    public function testCreate()
    {
        $token = Token::create();

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\ValueObject\Token', $token);
    }

    public function testGettersAndSetters()
    {
        $this->prophet = new Prophet();

        $token = Token::create();
        $this->assertEquals(null, $token->getAuthorization());
        $this->assertEquals(null, $token->getUserName());
        $this->assertEquals(false, $token->isValid());

        $authorization = $this->prophet->prophesize('Shoko\TwitchApiBundle\Model\Entity\ValueObject\Authorization');
        $token
          ->setAuthorization($authorization->reveal())
          ->setUserName('some_username')
          ->setValid(false)
        ;
        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\ValueObject\Authorization', $token->getAuthorization());
        $this->assertEquals('some_username', $token->getUserName());
        $this->assertEquals(false, $token->isValid());
    }
}
