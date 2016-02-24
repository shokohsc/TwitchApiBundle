<?php

namespace Shoko\TwitchApiBundle\Tests\Factory;

use Shoko\TwitchApiBundle\Factory\TokenFactory;
use Shoko\TwitchApiBundle\Model\ValueObject\Token;

/**
 * TokenFactoryTest class.
 */
class TokenFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test create token method.
     */
    public function testCreateToken()
    {
        $data = [
          // 'authorization' => [
          //   'scopes'    => ['user_read', 'channel_read', 'channel_commercial', 'user_read'],
          //   'created_at' => '2012-05-08T21:55:12Z',
          //   'updated_at' => '2012-05-17T21:32:13Z',
          // ],
          'user_name' => 'test_user1',
          'valid' => false,
        ];

        $tokenFactory = new TokenFactory();
        $token = $tokenFactory->createEntity($data);

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\ValueObject\Token', $token);
        $this->assertEquals(null, $token->getAuthorization());
        $this->assertEquals('test_user1', $token->getUserName());
        $this->assertEquals(false, $token->isValid());
    }
}
