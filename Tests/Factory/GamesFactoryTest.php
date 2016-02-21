<?php

namespace Shoko\TwitchApiBundle\Tests\Factory;

use Shoko\TwitchApiBundle\Factory\GamesFactory;
use Shoko\TwitchApiBundle\Model\Entity\Games;

/**
 * GamesFactoryTest class.
 */
class GamesFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test create position method.
     */
    public function testCreateGames()
    {
        $data = [
          'viewers' => 42,
          'channels' => 42,
          'game' => [
            'name' => 'some_game',
          ],
        ];

        $positionFactory = new GamesFactory();
        $position = $positionFactory->createEntity($data);

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Games', $position);
        $this->assertEquals(42, $position->getViewers());
        $this->assertEquals(42, $position->getChannels());
    }
}
