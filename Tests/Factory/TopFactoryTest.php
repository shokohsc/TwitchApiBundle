<?php

namespace Shoko\TwitchApiBundle\Tests\Factory;

use Shoko\TwitchApiBundle\Factory\TopFactory;
use Shoko\TwitchApiBundle\Model\Entity\Top;
use Shoko\TwitchApiBundle\Util\JsonTransformer;

/**
 * TopFactoryTest class.
 */
class TopFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test create top method.
     */
    public function testCreateEntity()
    {
        $json = '{"_links": {"self": "https://api.twitch.tv/kraken/games/top?limit=10&offset=0","next": "https://api.twitch.tv/kraken/games/top?limit=10&offset=10"},"_total": 322,"top": [{"game": {"name": "Counter-Strike: Global Offensive","box": {"large": "http://static-cdn.jtvnw.net/ttv-boxart/Counter-Strike:%20Global%20Offensive-272x380.jpg","medium": "http://static-cdn.jtvnw.net/ttv-boxart/Counter-Strike:%20Global%20Offensive-136x190.jpg","small": "http://static-cdn.jtvnw.net/ttv-boxart/Counter-Strike:%20Global%20Offensive-52x72.jpg","template": "http://static-cdn.jtvnw.net/ttv-boxart/Counter-Strike:%20Global%20Offensive-{width}x{height}.jpg"},"logo": {"large": "http://static-cdn.jtvnw.net/ttv-logoart/Counter-Strike:%20Global%20Offensive-240x144.jpg","medium": "http://static-cdn.jtvnw.net/ttv-logoart/Counter-Strike:%20Global%20Offensive-120x72.jpg","small": "http://static-cdn.jtvnw.net/ttv-logoart/Counter-Strike:%20Global%20Offensive-60x36.jpg","template": "http://static-cdn.jtvnw.net/ttv-logoart/Counter-Strike:%20Global%20Offensive-{width}x{height}.jpg"},"_links": {},"_id": 32399,"giantbomb_id": 36113},"viewers": 23873,"channels": 305}]}';
        $data = (new JsonTransformer())->transform($json);

        $rankFactory = new TopFactory();
        $rank = $rankFactory->createEntity($data);

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Top', $rank);
        $this->assertEquals(322, $rank->getTotal());
        $this->assertArrayHasKey('self', $rank->getLinks());
    }

    /**
     * Test create games method.
     */
    public function testCreateRanks()
    {
        $json = '{"_links": {"self": "https://api.twitch.tv/kraken/games/top?limit=10&offset=0","next": "https://api.twitch.tv/kraken/games/top?limit=10&offset=10"},"_total": 322,"top": [{"game": {"name": "Counter-Strike: Global Offensive","box": {"large": "http://static-cdn.jtvnw.net/ttv-boxart/Counter-Strike:%20Global%20Offensive-272x380.jpg","medium": "http://static-cdn.jtvnw.net/ttv-boxart/Counter-Strike:%20Global%20Offensive-136x190.jpg","small": "http://static-cdn.jtvnw.net/ttv-boxart/Counter-Strike:%20Global%20Offensive-52x72.jpg","template": "http://static-cdn.jtvnw.net/ttv-boxart/Counter-Strike:%20Global%20Offensive-{width}x{height}.jpg"},"logo": {"large": "http://static-cdn.jtvnw.net/ttv-logoart/Counter-Strike:%20Global%20Offensive-240x144.jpg","medium": "http://static-cdn.jtvnw.net/ttv-logoart/Counter-Strike:%20Global%20Offensive-120x72.jpg","small": "http://static-cdn.jtvnw.net/ttv-logoart/Counter-Strike:%20Global%20Offensive-60x36.jpg","template": "http://static-cdn.jtvnw.net/ttv-logoart/Counter-Strike:%20Global%20Offensive-{width}x{height}.jpg"},"_links": {},"_id": 32399,"giantbomb_id": 36113},"viewers": 23873,"channels": 305}]}';
        $data = (new JsonTransformer())->transform($json);

        $rankFactory = new TopFactory();
        $ranks = $rankFactory->createRanks($data['top']);

        $this->assertEquals(1, count($ranks));
        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Rank', $ranks[0]);
        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Game', $ranks[0]->getGame());
        $this->assertEquals(23873, $ranks[0]->getViewers());
        $this->assertEquals(305, $ranks[0]->getChannels());
    }
}
