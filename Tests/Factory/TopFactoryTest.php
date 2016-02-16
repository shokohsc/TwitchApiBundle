<?php

namespace Shoko\TwitchApiBundle\Tests\Factory;

use Shoko\TwitchApiBundle\Factory\TopFactory;
use Shoko\TwitchApiBundle\Model\Entity\Top;

/**
 * TopFactoryTest class.
 */
class TopFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test create top method.
     */
    public function testCreateTop()
    {
        $data = [
          '_links' => [
            'self' => 'https://api.twitch.tv/kraken/tops/test_channel1',
          ],
          '_total' => 42,
          'top' => [
            [
              'viewers' => 42,
              'channels' => 42,
              'game' => [
                'name' => 'some_game',
              ],
            ],
          ],
        ];

        $topFactory = new TopFactory();
        $top = $topFactory->createEntity($data);

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Top', $top);
        $this->assertArrayHasKey('self', $top->getLinks());
        $this->assertEquals('https://api.twitch.tv/kraken/tops/test_channel1', $top->getLinks()['self']);
        $this->assertEquals(42, $top->getTotal());
    }
}
