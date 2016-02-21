<?php

namespace Shoko\TwitchApiBundle\Tests\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\GameList;
use Shoko\TwitchApiBundle\Model\Entity\Game;

/**
 * GameListTest class.
 */
class GameListTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test Get/Set, create, endpoint methods.
     */
    public function testGameListEntity()
    {
        $gameList = GameList::create();

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\GameList', $gameList);

        $this->assertEquals(array(), $gameList->getLinks());
        $link = 'some_link';
        $this->assertEquals([$link], $gameList->setLinks([$link])->getLinks());

        $this->assertEquals(array(), $gameList->getGames());
        $game = new Game();
        $this->assertEquals([$game], $gameList->setGames([$game])->getGames());

        $this->assertEquals(0, $gameList->getTotal());
        $this->assertEquals(42, $gameList->setTotal(42)->getTotal());
    }
}
