<?php

namespace Shoko\TwitchApiBundle\Tests\Factory;

use Shoko\TwitchApiBundle\Factory\UserFactory;
use Shoko\TwitchApiBundle\Model\Entity\User;

/**
 * UserFactoryTest class.
 */
class UserFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test create user method.
     */
    public function testCreateUser()
    {
        $data = [
          'type' => 'user',
          'name' => 'test_user1',
          'created_at' => '2011-06-03T17:49:19Z',
          'updated_at' => '2012-06-18T17:19:57Z',
          '_links' => [
            'self'    => 'https://api.twitch.tv/kraken/users/test_user1',
            'another_key' => 'another_value',
          ],
          'logo' => 'http://static-cdn.jtvnw.net/jtv_user_pictures/test_user1-profile_image-62e8318af864d6d7-300x300.jpeg',
          '_id' => 21229404,
          'display_name' => 'test_user1',
          'bio' => 'test bio woo I\'m a test user'
        ];

        $userFactory = new UserFactory;
        $user = $userFactory->createUser($data);

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\User', $user);
        $this->assertEquals('user', $user->getType());
        $this->assertEquals('test_user1', $user->getName());
        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\ValueObject\Link', $user->getLinks()[0]);
        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\ValueObject\Link', $user->getLinks()[1]);
    }
}
