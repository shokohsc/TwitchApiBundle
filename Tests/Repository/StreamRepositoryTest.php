<?php

namespace Shoko\TwitchApiBundle\Tests\Lib;

use Shoko\TwitchApiBundle\Repository\StreamRepository;
use Shoko\TwitchApiBundle\Factory\StreamFactory;
use Shoko\TwitchApiBundle\Model\Entity\Stream;
use Shoko\TwitchApiBundle\Util\JsonTransformer;
use Prophecy\Prophet;

/**
 * StreamRepositoryTest class.
 */
class StreamRepositoryTest extends \PHPUnit_Framework_TestCase
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
     * Test Get stream method.
     */
    public function testGetStream()
    {
        $client = $this->prophet->prophesize('Shoko\TwitchApiBundle\Lib\Client');
        $factory = new StreamFactory();
        $transformer = new JsonTransformer();
        $repository = new StreamRepository($client->reveal(), $factory, $transformer);

        $response = $this->prophet->prophesize('GuzzleHttp\Psr7\Response');
        $client->get(Stream::ENDPOINT.'some_stream')->willReturn($response->reveal());

        $body = $this->prophet->prophesize();
        $body->willImplement('Psr\Http\Message\StreamInterface');
        $response->getBody()->willReturn($body->reveal());

        $content = '{"stream":null,"_links":{"self":"https://api.twitch.tv/kraken/streams/test_channel","channel":"https://api.twitch.tv/kraken/channels/test_channel"}}';
        $body->getContents()->willReturn($content);

        $result = $repository->getStream('some_stream');
        $expected = (new StreamFactory())->createEntity(json_decode($content, true));

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
