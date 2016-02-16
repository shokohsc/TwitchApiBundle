<?php

namespace Shoko\TwitchApiBundle\Tests\Factory;

use Shoko\TwitchApiBundle\Factory\PositionFactory;
use Shoko\TwitchApiBundle\Model\Entity\Position;

/**
 * PositionFactoryTest class.
 */
class PositionFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test create position method.
     */
    public function testCreatePosition()
    {
        $data = [
          'viewers' => 42,
          'channels' => 42,
          'game' => [
            'name' => 'some_game',
          ],
        ];

        $positionFactory = new PositionFactory();
        $position = $positionFactory->createEntity($data);

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Position', $position);
        $this->assertEquals(42, $position->getViewers());
        $this->assertEquals(42, $position->getChannels());
    }
}
