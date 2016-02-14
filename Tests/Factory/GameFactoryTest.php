<?php

namespace Shoko\TwitchApiBundle\Tests\Factory;

use Shoko\TwitchApiBundle\Factory\GameFactory;
use Shoko\TwitchApiBundle\Model\Entity\Game;

/**
 * GameFactoryTest class.
 */
class GameFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test create game method.
     */
    public function testCreateGame()
    {
        $data = [
          'name' => 'test_game1',
          '_links' => [
            'self' => 'https://api.twitch.tv/kraken/games/test_game1',
            'another_key' => 'another_value',
          ],
          'logo' => [
            'self' => 'https://api.twitch.tv/kraken/games/test_game1',
            'another_key' => 'another_value',
          ],
          'box' => [
            'self' => 'https://api.twitch.tv/kraken/games/test_game1',
            'another_key' => 'another_value',
          ],
          '_id' => 21229404,
          'giantbomb_id' => 212294,
        ];

        $gameFactory = new GameFactory();
        $game = $gameFactory->createEntity($data);

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Game', $game);
        $this->assertEquals('test_game1', $game->getName());
        $this->assertArrayHasKey('self', $game->getLinks());
        $this->assertEquals('https://api.twitch.tv/kraken/games/test_game1', $game->getLinks()['self']);
        $this->assertArrayHasKey('another_key', $game->getLinks());
        $this->assertEquals('another_value', $game->getLinks()['another_key']);
        $this->assertArrayHasKey('self', $game->getLogo());
        $this->assertEquals('https://api.twitch.tv/kraken/games/test_game1', $game->getLogo()['self']);
        $this->assertArrayHasKey('another_key', $game->getLogo());
        $this->assertEquals('another_value', $game->getLogo()['another_key']);
        $this->assertArrayHasKey('self', $game->getBox());
        $this->assertEquals('https://api.twitch.tv/kraken/games/test_game1', $game->getBox()['self']);
        $this->assertArrayHasKey('another_key', $game->getBox());
        $this->assertEquals('another_value', $game->getBox()['another_key']);
        $this->assertEquals(21229404, $game->getId());
    }
}
