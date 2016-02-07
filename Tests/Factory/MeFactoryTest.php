<?php

namespace Shoko\TwitchApiBundle\Tests\Factory;

use Shoko\TwitchApiBundle\Factory\MeFactory;
use Shoko\TwitchApiBundle\Model\Entity\Me;

/**
 * MeFactoryTest class.
 */
class MeFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test create me method.
     */
    public function testCreateMe()
    {
        $data = [
          'type' => 'me',
          'name' => 'test_me1',
          'created_at' => '2011-06-03T17:49:19Z',
          'updated_at' => '2012-06-18T17:19:57Z',
          '_links' => [
            'self'    => 'https://api.twitch.tv/kraken/mes/test_me1',
            'another_key' => 'another_value',
          ],
          'logo' => 'http://static-cdn.jtvnw.net/jtv_me_pictures/test_me1-profile_image-62e8318af864d6d7-300x300.jpeg',
          '_id' => 21229404,
          'display_name' => 'test_me1',
          'bio' => 'test bio woo I\'m a test me',
          'email' => 'some_email',
          'partnered' => true,
          'notifications' => [
            'email' => false,
            'push' => true,
          ],
        ];

        $meFactory = new MeFactory;
        $me = $meFactory->createMe($data);

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Me', $me);
        $this->assertEquals('me', $me->getType());
        $this->assertEquals('test_me1', $me->getName());
        $this->assertEquals(new \DateTime('2011-06-03T17:49:19Z'), $me->getCreatedAt());
        $this->assertEquals(new \DateTime('2012-06-18T17:19:57Z'), $me->getUpdatedAt());
        $this->assertArrayHasKey('self', $me->getLinks());
        $this->assertEquals('https://api.twitch.tv/kraken/mes/test_me1', $me->getLinks()['self']);
        $this->assertArrayHasKey('another_key', $me->getLinks());
        $this->assertEquals('another_value', $me->getLinks()['another_key']);
        $this->assertEquals('http://static-cdn.jtvnw.net/jtv_me_pictures/test_me1-profile_image-62e8318af864d6d7-300x300.jpeg', $me->getLogo());
        $this->assertEquals(21229404, $me->getId());
        $this->assertEquals('test_me1', $me->getDisplayName());
        $this->assertEquals('test bio woo I\'m a test me', $me->getBio());
        $this->assertEquals('some_email', $me->getEmail());
        $this->assertEquals(true, $me->isPartnered());
        $this->assertEquals(array('email' => false, 'push' => true), $me->getNotifications());
    }
}
