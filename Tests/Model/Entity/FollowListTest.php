<?php

namespace Shoko\TwitchApiBundle\Tests\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\FollowList;
use Shoko\TwitchApiBundle\Model\Entity\Follow;

/**
 * FollowListTest class.
 */
class FollowListTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test Get/Set, create, endpoint methods.
     */
    public function testFollowListEntity()
    {
        $followList = FollowList::create();

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\FollowList', $followList);

        $this->assertEquals(array(), $followList->getLinks());
        $link = 'some_link';
        $this->assertEquals([$link], $followList->setLinks([$link])->getLinks());

        $this->assertEquals(array(), $followList->getFollows());
        $follow = new Follow();
        $this->assertEquals([$follow], $followList->setFollows([$follow])->getFollows());

        $this->assertEquals(0, $followList->getTotal());
        $this->assertEquals(42, $followList->setTotal(42)->getTotal());

        $this->assertEquals(null, $followList->getCursor());
        $this->assertEquals('some_cursor', $followList->setCursor('some_cursor')->getCursor());
    }
}
