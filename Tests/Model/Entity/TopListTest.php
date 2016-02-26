<?php

namespace Shoko\TwitchApiBundle\Tests\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\TopList;
use Shoko\TwitchApiBundle\Model\Entity\Game;

/**
 * TopListTest class.
 */
class TopListTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test Get/Set, create, endpoint methods.
     */
    public function testTopListEntity()
    {
        $topList = TopList::create();

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\TopList', $topList);

        $this->assertEquals(null, $topList->getGame());
        $game = new Game();
        $this->assertEquals($game, $topList->setGame($game)->getGame());

        $this->assertEquals(0, $topList->getViewers());
        $this->assertEquals(42, $topList->setViewers(42)->getViewers());

        $this->assertEquals(0, $topList->getChannels());
        $this->assertEquals(42, $topList->setChannels(42)->getChannels());
    }
}
