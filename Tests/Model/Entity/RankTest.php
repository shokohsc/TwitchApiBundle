<?php

namespace Shoko\TwitchApiBundle\Tests\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\Rank;
use Shoko\TwitchApiBundle\Model\Entity\Game;

/**
 * RankTest class.
 */
class RankTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test Get/Set, create, endpoint methods.
     */
    public function testRankEntity()
    {
        $rank = Rank::create();

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Rank', $rank);

        $this->assertEquals(null, $rank->getGame());
        $game = new Game();
        $this->assertEquals($game, $rank->setGame($game)->getGame());

        $this->assertEquals(0, $rank->getViewers());
        $this->assertEquals(42, $rank->setViewers(42)->getViewers());

        $this->assertEquals(0, $rank->getChannels());
        $this->assertEquals(42, $rank->setChannels(42)->getChannels());

        $this->assertEquals(array(), $rank->getLinks());
        $link = 'some_link';
        $this->assertEquals([$link], $rank->setLinks([$link])->getLinks());
    }
}
