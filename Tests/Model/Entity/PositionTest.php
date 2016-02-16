<?php

namespace Shoko\TwitchApiBundle\Tests\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\Position;
use Shoko\TwitchApiBundle\Model\Entity\Game;

/**
 * PositionTest class.
 */
class PositionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test Get/Set, create, endpoint methods.
     */
    public function testPositionEntity()
    {
        $position = Position::create();

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Position', $position);

        $this->assertEquals(0, $position->getViewers());
        $this->assertEquals(42, $position->setViewers(42)->getViewers());

        $this->assertEquals(0, $position->getChannels());
        $this->assertEquals(42, $position->setChannels(42)->getChannels());

        $this->assertEquals(null, $position->getGame());
        $channel = Game::create();
        $this->assertEquals($channel, $position->setGame($channel)->getGame());
    }
}
