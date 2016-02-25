<?php

namespace Shoko\TwitchApiBundle\Tests\Factory;

use Shoko\TwitchApiBundle\Factory\GameFactory;
use Shoko\TwitchApiBundle\Model\Entity\Game;
use Shoko\TwitchApiBundle\Util\JsonTransformer;

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
        $json = '{"box": {"large": "http://static-cdn.jtvnw.net/ttv-boxart/StarCraft%20II:%20Wings%20of%20Liberty-272x380.jpg","medium": "http://static-cdn.jtvnw.net/ttv-boxart/StarCraft%20II:%20Wings%20of%20Liberty-136x190.jpg","small": "http://static-cdn.jtvnw.net/ttv-boxart/StarCraft%20II:%20Wings%20of%20Liberty-52x72.jpg","template": "http://static-cdn.jtvnw.net/ttv-boxart/StarCraft%20II:%20Wings%20of%20Liberty-{width}x{height}.jpg"},"logo": {"large": "http://static-cdn.jtvnw.net/ttv-logoart/StarCraft%20II:%20Wings%20of%20Liberty-240x144.jpg","medium": "http://static-cdn.jtvnw.net/ttv-logoart/StarCraft%20II:%20Wings%20of%20Liberty-120x72.jpg","small": "http://static-cdn.jtvnw.net/ttv-logoart/StarCraft%20II:%20Wings%20of%20Liberty-60x36.jpg","template": "http://static-cdn.jtvnw.net/ttv-logoart/StarCraft%20II:%20Wings%20of%20Liberty-{width}x{height}.jpg"},"popularity": 114,"name": "StarCraft II: Wings of Liberty","_id": 63011880,"_links": { },"giantbomb_id": 20674}';
        $data = (new JsonTransformer)->transform($json);

        $gameFactory = new GameFactory();
        $game = $gameFactory->createEntity($data);

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Game', $game);
        $this->assertEquals('StarCraft II: Wings of Liberty', $game->getName());
        $this->assertEquals(array(), $game->getLinks());
        $this->assertArrayHasKey('medium', $game->getLogo());
        $this->assertEquals('http://static-cdn.jtvnw.net/ttv-logoart/StarCraft%20II:%20Wings%20of%20Liberty-120x72.jpg', $game->getLogo()['medium']);
        $this->assertArrayHasKey('small', $game->getBox());
        $this->assertEquals('http://static-cdn.jtvnw.net/ttv-boxart/StarCraft%20II:%20Wings%20of%20Liberty-52x72.jpg', $game->getBox()['small']);
        $this->assertEquals(63011880, $game->getId());
        $this->assertEquals(20674, $game->getGiantBombId());
        $this->assertEquals(114, $game->getPopularity());
    }

    /**
     * Test create gameList method.
     */
    public function testCreateGameList()
    {
        $json = '{"_links": {"self": "https://api.twitch.tv/kraken/search/games?q=star&type=suggest"},"games": [{"box": {"large": "http://static-cdn.jtvnw.net/ttv-boxart/StarCraft%20II:%20Wings%20of%20Liberty-272x380.jpg","medium": "http://static-cdn.jtvnw.net/ttv-boxart/StarCraft%20II:%20Wings%20of%20Liberty-136x190.jpg","small": "http://static-cdn.jtvnw.net/ttv-boxart/StarCraft%20II:%20Wings%20of%20Liberty-52x72.jpg","template": "http://static-cdn.jtvnw.net/ttv-boxart/StarCraft%20II:%20Wings%20of%20Liberty-{width}x{height}.jpg"},"logo": {"large": "http://static-cdn.jtvnw.net/ttv-logoart/StarCraft%20II:%20Wings%20of%20Liberty-240x144.jpg","medium": "http://static-cdn.jtvnw.net/ttv-logoart/StarCraft%20II:%20Wings%20of%20Liberty-120x72.jpg","small": "http://static-cdn.jtvnw.net/ttv-logoart/StarCraft%20II:%20Wings%20of%20Liberty-60x36.jpg","template": "http://static-cdn.jtvnw.net/ttv-logoart/StarCraft%20II:%20Wings%20of%20Liberty-{width}x{height}.jpg"},"popularity": 114,"name": "StarCraft II: Wings of Liberty","_id": 63011880,"_links": { },"giantbomb_id": 20674}]}';
        $data = (new JsonTransformer)->transform($json);

        $gameFactory = new GameFactory();
        $gameList = $gameFactory->createList($data);

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\GameList', $gameList);
        $this->assertArrayHasKey('self', $gameList->getLinks());
        $this->assertEquals('https://api.twitch.tv/kraken/search/games?q=star&type=suggest', $gameList->getLinks()['self']);
    }

    /**
     * Test create games method.
     */
    public function testCreateGames()
    {
        $json = '{"_links": {"self": "https://api.twitch.tv/kraken/search/games?q=star&type=suggest"},"games": [{"box": {"large": "http://static-cdn.jtvnw.net/ttv-boxart/StarCraft%20II:%20Wings%20of%20Liberty-272x380.jpg","medium": "http://static-cdn.jtvnw.net/ttv-boxart/StarCraft%20II:%20Wings%20of%20Liberty-136x190.jpg","small": "http://static-cdn.jtvnw.net/ttv-boxart/StarCraft%20II:%20Wings%20of%20Liberty-52x72.jpg","template": "http://static-cdn.jtvnw.net/ttv-boxart/StarCraft%20II:%20Wings%20of%20Liberty-{width}x{height}.jpg"},"logo": {"large": "http://static-cdn.jtvnw.net/ttv-logoart/StarCraft%20II:%20Wings%20of%20Liberty-240x144.jpg","medium": "http://static-cdn.jtvnw.net/ttv-logoart/StarCraft%20II:%20Wings%20of%20Liberty-120x72.jpg","small": "http://static-cdn.jtvnw.net/ttv-logoart/StarCraft%20II:%20Wings%20of%20Liberty-60x36.jpg","template": "http://static-cdn.jtvnw.net/ttv-logoart/StarCraft%20II:%20Wings%20of%20Liberty-{width}x{height}.jpg"},"popularity": 114,"name": "StarCraft II: Wings of Liberty","_id": 63011880,"_links": { },"giantbomb_id": 20674}]}';
        $data = (new JsonTransformer)->transform($json);

        $gameFactory = new GameFactory();
        $gameList = $gameFactory->createGames($data['games']);

        $this->assertEquals(1, count($gameList));
        dump($gameList);
        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Game', $gameList[0]->getGame());
    }
}
