<?php

namespace Shoko\TwitchApiBundle\Tests\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\Games;
use Shoko\TwitchApiBundle\Model\Entity\Game;

/**
 * GamesTest class.
 */
class GamesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test Get/Set, create, endpoint methods.
     */
    public function testGamesEntity()
    {
        $games = Games::create();

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Games', $games);

        $this->assertEquals(0, $games->getViewers());
        $this->assertEquals(42, $games->setViewers(42)->getViewers());

        $this->assertEquals(0, $games->getChannels());
        $this->assertEquals(42, $games->setChannels(42)->getChannels());

        $this->assertEquals(null, $games->getGame());
        $game = Game::create();
        $this->assertEquals($game, $games->setGame($game)->getGame());
    }
}
