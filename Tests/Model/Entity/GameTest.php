<?php

namespace Shoko\TwitchApiBundle\Tests\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\Game;

/**
 * GameTest class.
 */
class GameTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test Get/Set, create, endpoint methods.
     */
    public function testGameEntity()
    {
        $game = Game::create();

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Game', $game);

        $this->assertEquals(null, $game->getName());
        $this->assertEquals('some_name', $game->setName('some_name')->getName());

        $this->assertEquals(array(), $game->getLinks());
        $link = 'some_link';
        $this->assertEquals([$link], $game->setLinks([$link])->getLinks());

        $this->assertEquals(array(), $game->getLogo());
        $logo = 'some_logo';
        $this->assertEquals([$logo], $game->setLogo([$logo])->getLogo());

        $this->assertEquals(array(), $game->getBox());
        $box = 'some_box';
        $this->assertEquals([$box], $game->setBox([$box])->getBox());

        $this->assertEquals(null, $game->getId());
        $this->assertEquals('some_id', $game->setId('some_id')->getId());

        $this->assertEquals(null, $game->getGiantBombId());
        $this->assertEquals('some_giantbomb_id', $game->setGiantBombId('some_giantbomb_id')->getGiantBombId());

        $this->assertEquals(0, $game->getPopularity());
        $this->assertEquals(42, $game->setPopularity(42)->getPopularity());
    }
}
