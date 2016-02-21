<?php

namespace Shoko\TwitchApiBundle\Tests\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\Top;
use Shoko\TwitchApiBundle\Model\Entity\Game;

/**
 * TopTest class.
 */
class TopTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test Get/Set, create, endpoint methods.
     */
    public function testTopEntity()
    {
        $top = Top::create();

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Top', $top);

        $this->assertEquals(array(), $top->getLinks());
        $link = 'some_link';
        $this->assertEquals([$link], $top->setLinks([$link])->getLinks());

        $this->assertEquals(array(), $top->getGames());
        $game = new Game();
        $this->assertEquals([$game], $top->setGames([$game])->getGames());

        $this->assertEquals(0, $top->getTotal());
        $this->assertEquals(42, $top->setTotal(42)->getTotal());
    }
}
