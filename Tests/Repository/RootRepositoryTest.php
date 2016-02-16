<?php

namespace Shoko\TwitchApiBundle\Tests\Lib;

use Shoko\TwitchApiBundle\Repository\RootRepository;
use Shoko\TwitchApiBundle\Factory\RootFactory;
use Shoko\TwitchApiBundle\Model\Entity\Root;
use Shoko\TwitchApiBundle\Util\JsonTransformer;
use Prophecy\Prophet;

/**
 * RootRepositoryTest class.
 */
class RootRepositoryTest extends \PHPUnit_Framework_TestCase
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
    public function testGetRoot()
    {
        $client = $this->prophet->prophesize('Shoko\TwitchApiBundle\Lib\Client');
        $factory = new RootFactory();
        $transformer = new JsonTransformer();
        $repository = new RootRepository($client->reveal(), $factory, $transformer);

        $response = $this->prophet->prophesize('GuzzleHttp\Psr7\Response');
        $client->get(Root::ENDPOINT)->willReturn($response->reveal());

        $body = $this->prophet->prophesize();
        $body->willImplement('Psr\Http\Message\StreamInterface');
        $response->getBody()->willReturn($body->reveal());

        $content = '{"_links":{"user":"https://api.twitch.tv/kraken/user","channel":"https://api.twitch.tv/kraken/channel","search":"https://api.twitch.tv/kraken/search","streams":"https://api.twitch.tv/kraken/streams","ingests":"https://api.twitch.tv/kraken/ingests","teams":"https://api.twitch.tv/kraken/teams"},"token":{"valid":false,"authorization":null}}';
        $body->getContents()->willReturn($content);

        $result = $repository->get();
        $expected = (new RootFactory())->createEntity(json_decode($content, true));

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
