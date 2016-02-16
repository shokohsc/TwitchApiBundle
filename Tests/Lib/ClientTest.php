<?php

namespace Shoko\TwitchApiBundle\Tests\Lib;

use Shoko\TwitchApiBundle\Lib\Client;
use Prophecy\Prophet;
use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

/**
 * ClientTest class.
 */
class ClientTest extends \PHPUnit_Framework_TestCase
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
     * Test GetUrl method.
     */
    public function testGetUrl()
    {
        $client = new Client();
        $url = $client->getUrl();
        $expected = 'https://api.twitch.tv/kraken/';

        $this->assertEquals($expected, $url);
    }

    /**
     * Test getHeaders method.
     */
    public function testGetHeaders()
    {
        $client = new Client();
        $headers = $client->getHeaders();
        $expected = array('Accept' => 'application/vnd.twitchtv.v3+json');

        $this->assertEquals($expected, $headers);
    }

    /**
     * Test getGuzzle method.
     */
    public function testGuzzle()
    {
        $guzzle = new Guzzle();
        $client = new Client($guzzle);
        $result = $client->getGuzzle();

        $this->assertEquals($guzzle, $result);
        $this->assertInstanceOf('GuzzleHttp\Client', $result);
    }

    /**
     * Test get method.
     */
    public function testGet()
    {
        $mock = new MockHandler([new Response(200)]);
        $handler = HandlerStack::create($mock);
        $guzzle = new Guzzle(['handler' => $handler]);

        $client = new Client($guzzle);
        $response = $client->get('');

        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * {@inheridoc}.
     */
    protected function tearDown()
    {
        $this->prophet->checkPredictions();
    }
}
