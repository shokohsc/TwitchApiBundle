<?php

namespace Shoko\TwitchApiBundle\Tests\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\Follow;
use Shoko\TwitchApiBundle\Model\Entity\Channel;

/**
 * FollowTest class.
 */
class FollowTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test Get/Set, create, endpoint methods.
     */
    public function testFollowEntity()
    {
        $follow = Follow::create();

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Follow', $follow);

        $date = new \DateTime();
        $this->assertEquals(null, $follow->getCreatedAt());
        $this->assertEquals($date, $follow->setCreatedAt($date)->getCreatedAt());

        $this->assertEquals(array(), $follow->getLinks());
        $link = 'some_link';
        $this->assertEquals([$link], $follow->setLinks([$link])->getLinks());

        $this->assertEquals(false, $follow->isNotifications());
        $this->assertEquals(true, $follow->setNotifications(true)->isNotifications());

        $this->assertEquals(null, $follow->getChannel());
        $channel = Channel::create();
        $this->assertEquals($channel, $follow->setChannel($channel)->getChannel());
    }
}
