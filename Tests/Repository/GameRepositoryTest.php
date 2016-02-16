<?php

namespace Shoko\TwitchApiBundle\Tests\Lib;

use Shoko\TwitchApiBundle\Repository\GameRepository;
use Shoko\TwitchApiBundle\Factory\TopFactory;
use Shoko\TwitchApiBundle\Model\Entity\Game;
use Shoko\TwitchApiBundle\Util\JsonTransformer;
use Prophecy\Prophet;

/**
 * GameRepositoryTest class.
 */
class GameRepositoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Prophet $prophet.
     *
     * @var Prophet
     */
    private $prophet;

    /**
     * {@inheridoc}.
     */
    protected function setup()
    {
        $this->prophet = new Prophet();
    }

    /**
     * Test Get user method.
     */
    public function testGetTop()
    {
        $client = $this->prophet->prophesize('Shoko\TwitchApiBundle\Lib\Client');
        $factory = new TopFactory;
        $transformer = new JsonTransformer;
        $repository = new GameRepository($client->reveal(), $factory, $transformer);

        $response = $this->prophet->prophesize('GuzzleHttp\Psr7\Response');
        $client->get(Game::ENDPOINT)->willReturn($response->reveal());

        $body = $this->prophet->prophesize();
        $body->willImplement('Psr\Http\Message\StreamInterface');
        $response->getBody()->willReturn($body->reveal());

        $content = '{"_total":1311,"_links":{"self":"https://api.twitch.tv/kraken/games/top?limit=10&offset=0","next":"https://api.twitch.tv/kraken/games/top?limit=10&offset=10"},"top":[{"viewers":195583,"channels":2665,"game":{"name":"League of Legends","_id":21779,"giantbomb_id":24024,"box":{"large":"http://static-cdn.jtvnw.net/ttv-boxart/League%20of%20Legends-272x380.jpg","medium":"http://static-cdn.jtvnw.net/ttv-boxart/League%20of%20Legends-136x190.jpg","small":"http://static-cdn.jtvnw.net/ttv-boxart/League%20of%20Legends-52x72.jpg","template":"http://static-cdn.jtvnw.net/ttv-boxart/League%20of%20Legends-{width}x{height}.jpg"},"logo":{"large":"http://static-cdn.jtvnw.net/ttv-logoart/League%20of%20Legends-240x144.jpg","medium":"http://static-cdn.jtvnw.net/ttv-logoart/League%20of%20Legends-120x72.jpg","small":"http://static-cdn.jtvnw.net/ttv-logoart/League%20of%20Legends-60x36.jpg","template":"http://static-cdn.jtvnw.net/ttv-logoart/League%20of%20Legends-{width}x{height}.jpg"},"_links":{}}},{"viewers":142373,"channels":752,"game":{"name":"Dota 2","_id":29595,"giantbomb_id":32887,"box":{"large":"http://static-cdn.jtvnw.net/ttv-boxart/Dota%202-272x380.jpg","medium":"http://static-cdn.jtvnw.net/ttv-boxart/Dota%202-136x190.jpg","small":"http://static-cdn.jtvnw.net/ttv-boxart/Dota%202-52x72.jpg","template":"http://static-cdn.jtvnw.net/ttv-boxart/Dota%202-{width}x{height}.jpg"},"logo":{"large":"http://static-cdn.jtvnw.net/ttv-logoart/Dota%202-240x144.jpg","medium":"http://static-cdn.jtvnw.net/ttv-logoart/Dota%202-120x72.jpg","small":"http://static-cdn.jtvnw.net/ttv-logoart/Dota%202-60x36.jpg","template":"http://static-cdn.jtvnw.net/ttv-logoart/Dota%202-{width}x{height}.jpg"},"_links":{}}},{"viewers":121978,"channels":1718,"game":{"name":"Counter-Strike: Global Offensive","_id":32399,"giantbomb_id":36113,"box":{"large":"http://static-cdn.jtvnw.net/ttv-boxart/Counter-Strike:%20Global%20Offensive-272x380.jpg","medium":"http://static-cdn.jtvnw.net/ttv-boxart/Counter-Strike:%20Global%20Offensive-136x190.jpg","small":"http://static-cdn.jtvnw.net/ttv-boxart/Counter-Strike:%20Global%20Offensive-52x72.jpg","template":"http://static-cdn.jtvnw.net/ttv-boxart/Counter-Strike:%20Global%20Offensive-{width}x{height}.jpg"},"logo":{"large":"http://static-cdn.jtvnw.net/ttv-logoart/Counter-Strike:%20Global%20Offensive-240x144.jpg","medium":"http://static-cdn.jtvnw.net/ttv-logoart/Counter-Strike:%20Global%20Offensive-120x72.jpg","small":"http://static-cdn.jtvnw.net/ttv-logoart/Counter-Strike:%20Global%20Offensive-60x36.jpg","template":"http://static-cdn.jtvnw.net/ttv-logoart/Counter-Strike:%20Global%20Offensive-{width}x{height}.jpg"},"_links":{}}},{"viewers":63811,"channels":438,"game":{"name":"Hearthstone: Heroes of Warcraft","_id":138585,"giantbomb_id":42033,"box":{"large":"http://static-cdn.jtvnw.net/ttv-boxart/Hearthstone:%20Heroes%20of%20Warcraft-272x380.jpg","medium":"http://static-cdn.jtvnw.net/ttv-boxart/Hearthstone:%20Heroes%20of%20Warcraft-136x190.jpg","small":"http://static-cdn.jtvnw.net/ttv-boxart/Hearthstone:%20Heroes%20of%20Warcraft-52x72.jpg","template":"http://static-cdn.jtvnw.net/ttv-boxart/Hearthstone:%20Heroes%20of%20Warcraft-{width}x{height}.jpg"},"logo":{"large":"http://static-cdn.jtvnw.net/ttv-logoart/Hearthstone:%20Heroes%20of%20Warcraft-240x144.jpg","medium":"http://static-cdn.jtvnw.net/ttv-logoart/Hearthstone:%20Heroes%20of%20Warcraft-120x72.jpg","small":"http://static-cdn.jtvnw.net/ttv-logoart/Hearthstone:%20Heroes%20of%20Warcraft-60x36.jpg","template":"http://static-cdn.jtvnw.net/ttv-logoart/Hearthstone:%20Heroes%20of%20Warcraft-{width}x{height}.jpg"},"_links":{}}},{"viewers":36155,"channels":3831,"game":{"name":"Call of Duty: Black Ops III","_id":489401,"giantbomb_id":48754,"box":{"large":"http://static-cdn.jtvnw.net/ttv-boxart/Call%20of%20Duty:%20Black%20Ops%20III-272x380.jpg","medium":"http://static-cdn.jtvnw.net/ttv-boxart/Call%20of%20Duty:%20Black%20Ops%20III-136x190.jpg","small":"http://static-cdn.jtvnw.net/ttv-boxart/Call%20of%20Duty:%20Black%20Ops%20III-52x72.jpg","template":"http://static-cdn.jtvnw.net/ttv-boxart/Call%20of%20Duty:%20Black%20Ops%20III-{width}x{height}.jpg"},"logo":{"large":"http://static-cdn.jtvnw.net/ttv-logoart/Call%20of%20Duty:%20Black%20Ops%20III-240x144.jpg","medium":"http://static-cdn.jtvnw.net/ttv-logoart/Call%20of%20Duty:%20Black%20Ops%20III-120x72.jpg","small":"http://static-cdn.jtvnw.net/ttv-logoart/Call%20of%20Duty:%20Black%20Ops%20III-60x36.jpg","template":"http://static-cdn.jtvnw.net/ttv-logoart/Call%20of%20Duty:%20Black%20Ops%20III-{width}x{height}.jpg"},"_links":{}}},{"viewers":28280,"channels":1114,"game":{"name":"Minecraft","_id":27471,"giantbomb_id":30475,"box":{"large":"http://static-cdn.jtvnw.net/ttv-boxart/Minecraft-272x380.jpg","medium":"http://static-cdn.jtvnw.net/ttv-boxart/Minecraft-136x190.jpg","small":"http://static-cdn.jtvnw.net/ttv-boxart/Minecraft-52x72.jpg","template":"http://static-cdn.jtvnw.net/ttv-boxart/Minecraft-{width}x{height}.jpg"},"logo":{"large":"http://static-cdn.jtvnw.net/ttv-logoart/Minecraft-240x144.jpg","medium":"http://static-cdn.jtvnw.net/ttv-logoart/Minecraft-120x72.jpg","small":"http://static-cdn.jtvnw.net/ttv-logoart/Minecraft-60x36.jpg","template":"http://static-cdn.jtvnw.net/ttv-logoart/Minecraft-{width}x{height}.jpg"},"_links":{}}},{"viewers":27162,"channels":10,"game":{"name":"Call of Duty 4: Modern Warfare","_id":1964,"giantbomb_id":2133,"box":{"large":"http://static-cdn.jtvnw.net/ttv-boxart/Call%20of%20Duty%204:%20Modern%20Warfare-272x380.jpg","medium":"http://static-cdn.jtvnw.net/ttv-boxart/Call%20of%20Duty%204:%20Modern%20Warfare-136x190.jpg","small":"http://static-cdn.jtvnw.net/ttv-boxart/Call%20of%20Duty%204:%20Modern%20Warfare-52x72.jpg","template":"http://static-cdn.jtvnw.net/ttv-boxart/Call%20of%20Duty%204:%20Modern%20Warfare-{width}x{height}.jpg"},"logo":{"large":"http://static-cdn.jtvnw.net/ttv-logoart/Call%20of%20Duty%204:%20Modern%20Warfare-240x144.jpg","medium":"http://static-cdn.jtvnw.net/ttv-logoart/Call%20of%20Duty%204:%20Modern%20Warfare-120x72.jpg","small":"http://static-cdn.jtvnw.net/ttv-logoart/Call%20of%20Duty%204:%20Modern%20Warfare-60x36.jpg","template":"http://static-cdn.jtvnw.net/ttv-logoart/Call%20of%20Duty%204:%20Modern%20Warfare-{width}x{height}.jpg"},"_links":{}}},{"viewers":20720,"channels":180,"game":{"name":"Overwatch","_id":488552,"giantbomb_id":48190,"box":{"large":"http://static-cdn.jtvnw.net/ttv-boxart/Overwatch-272x380.jpg","medium":"http://static-cdn.jtvnw.net/ttv-boxart/Overwatch-136x190.jpg","small":"http://static-cdn.jtvnw.net/ttv-boxart/Overwatch-52x72.jpg","template":"http://static-cdn.jtvnw.net/ttv-boxart/Overwatch-{width}x{height}.jpg"},"logo":{"large":"http://static-cdn.jtvnw.net/ttv-logoart/Overwatch-240x144.jpg","medium":"http://static-cdn.jtvnw.net/ttv-logoart/Overwatch-120x72.jpg","small":"http://static-cdn.jtvnw.net/ttv-logoart/Overwatch-60x36.jpg","template":"http://static-cdn.jtvnw.net/ttv-logoart/Overwatch-{width}x{height}.jpg"},"_links":{}}},{"viewers":19561,"channels":503,"game":{"name":"FIFA 16","_id":489608,"giantbomb_id":49601,"box":{"large":"http://static-cdn.jtvnw.net/ttv-boxart/FIFA%2016-272x380.jpg","medium":"http://static-cdn.jtvnw.net/ttv-boxart/FIFA%2016-136x190.jpg","small":"http://static-cdn.jtvnw.net/ttv-boxart/FIFA%2016-52x72.jpg","template":"http://static-cdn.jtvnw.net/ttv-boxart/FIFA%2016-{width}x{height}.jpg"},"logo":{"large":"http://static-cdn.jtvnw.net/ttv-logoart/FIFA%2016-240x144.jpg","medium":"http://static-cdn.jtvnw.net/ttv-logoart/FIFA%2016-120x72.jpg","small":"http://static-cdn.jtvnw.net/ttv-logoart/FIFA%2016-60x36.jpg","template":"http://static-cdn.jtvnw.net/ttv-logoart/FIFA%2016-{width}x{height}.jpg"},"_links":{}}},{"viewers":19546,"channels":210,"game":{"name":"XCOM 2","_id":489767,"giantbomb_id":49817,"box":{"large":"http://static-cdn.jtvnw.net/ttv-boxart/XCOM%202-272x380.jpg","medium":"http://static-cdn.jtvnw.net/ttv-boxart/XCOM%202-136x190.jpg","small":"http://static-cdn.jtvnw.net/ttv-boxart/XCOM%202-52x72.jpg","template":"http://static-cdn.jtvnw.net/ttv-boxart/XCOM%202-{width}x{height}.jpg"},"logo":{"large":"http://static-cdn.jtvnw.net/ttv-logoart/XCOM%202-240x144.jpg","medium":"http://static-cdn.jtvnw.net/ttv-logoart/XCOM%202-120x72.jpg","small":"http://static-cdn.jtvnw.net/ttv-logoart/XCOM%202-60x36.jpg","template":"http://static-cdn.jtvnw.net/ttv-logoart/XCOM%202-{width}x{height}.jpg"},"_links":{}}}]}';
        $body->getContents()->willReturn($content);

        $result = $repository->getTop();
        $expected = (new TopFactory)->createEntity(json_decode($content, true));

        $this->assertEquals($expected, $result);
    }

    /**
     * {@inheridoc}.
     */
    protected function tearDown()
    {
        $this->prophet->checkPredictions();
    }
}
