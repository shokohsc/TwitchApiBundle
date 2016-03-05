<?php

namespace Shoko\TwitchApiBundle\Tests\Factory;

use Shoko\TwitchApiBundle\Factory\RankFactory;
use Shoko\TwitchApiBundle\Util\JsonTransformer;

/**
 * RankFactoryTest class.
 */
class RankFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test create rank method.
     */
    public function testCreateEntity()
    {
        $json = '{"viewers": 194774,"_links": {"self": "https://api.twitch.tv/kraken/streams/summary"},"channels": 4144}';
        $data = (new JsonTransformer())->transform($json);

        $rankFactory = new RankFactory();
        $rank = $rankFactory->createEntity($data);

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Rank', $rank);
        $this->assertEquals(194774, $rank->getViewers());
        $this->assertEquals(4144, $rank->getChannels());
        $this->assertArrayHasKey('self', $rank->getLinks());
        $this->assertEquals('https://api.twitch.tv/kraken/streams/summary', $rank->getLinks()['self']);
    }
}
