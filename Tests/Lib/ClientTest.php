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
     * Test Client object properties/constants.
     */
    public function testClient()
    {
        $client = new Client('some_client_id');

        $this->assertEquals('https', $client::URL_PROTOCOL);
        $this->assertEquals('api.twitch.tv', $client::URL_HOST);
        $this->assertEquals('kraken', $client::URL_VERSION);
        $this->assertEquals('api', $client::URL_OLD_VERSION);
        $this->assertEquals(
          array(
            'Accept' => 'application/vnd.twitchtv.v3+json',
            'Client-ID' => 'some_client_id',
          ),
          $client->getHeaders()
        );
        $this->assertInstanceOf('GuzzleHttp\Client', $client->getGuzzle());
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
     * Test SetUrl method.
     */
    public function testSetUrl()
    {
        $client = new Client();
        $url = $client->setUrl('some_url')->getUrl();
        $expected = 'some_url';

        $this->assertEquals($expected, $url);
    }

    /**
     * Test setHeaders method.
     */
    public function testSetHeaders()
    {
        $client = new Client();
        $headers = $client->setHeaders(array())->getHeaders();
        $expected = array();

        $this->assertEquals($expected, $headers);
    }

    /**
     * Test getGuzzle method.
     */
    public function testGuzzle()
    {
        $guzzle = new Guzzle();
        $client = new Client();
        $result = $client->setGuzzle($guzzle)->getGuzzle();

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

        $client = new Client(null, $guzzle);
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
