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

    /**
     * Test create gameList method.
     */
    public function testCreateGameList()
    {
        $data = [
          '_links' => [
            'self' => 'https://api.twitch.tv/kraken/gameLists/test_channel1',
          ],
          '_total' => 42,
          'gameList' => [
            [
              'viewers' => 42,
              'channels' => 42,
              'game' => [
                'name' => 'some_game',
              ],
            ],
          ],
        ];

        $gameFactory = new GameFactory();
        $gameList = $gameFactory->createList($data);

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\GameList', $gameList);
        $this->assertArrayHasKey('self', $gameList->getLinks());
        $this->assertEquals('https://api.twitch.tv/kraken/gameLists/test_channel1', $gameList->getLinks()['self']);
        $this->assertEquals(42, $gameList->getTotal());
    }

    /**
     * Test create games method.
     */
    public function testCreateGames()
    {
        $data = [
          [
            'viewers' => 42,
            'channels' => 42,
            'game' => [
              'name' => 'some_game',
            ],
          ],
        ];

        $gameFactory = new GameFactory();
        $gameList = $gameFactory->createGames($data);

        $this->assertEquals(1, count($gameList));
        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Games', $gameList[0]);
        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Game', $gameList[0]->getGame());
        $this->assertEquals('42', $gameList[0]->getViewers());
        $this->assertEquals('some_game', $gameList[0]->getGame()->getName());
    }
}
