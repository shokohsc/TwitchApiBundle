<?php

namespace Shoko\TwitchApiBundle\Tests\Lib;

use Shoko\TwitchApiBundle\Model\ValueObject\Url;
use Shoko\TwitchApiBundle\Lib\Client;
use Prophecy\Prophet;
use Prophecy\Argument;

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
     * Prophet $prophet
     * @var Prophet
     */
    private $prophet;

    /**
     * {@inheridoc}
     */
    protected function setup()
    {
        $this->prophet = new Prophet;
    }

    public function testGetUrl()
    {
        $guzzle = $this->prophet->prophesize('GuzzleHttp\Client');
        $url = $this->prophet->prophesize('Shoko\TwitchApiBundle\Model\ValueObject\Url');
        $url = (new Client($guzzle->reveal(), $url->reveal()))->getUrl();

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\ValueObject\Url', $url);
    }

    /**
     * Test getHeaders method.
     */
    public function testGetHeaders()
    {
        $guzzle = $this->prophet->prophesize('GuzzleHttp\Client');
        $url = $this->prophet->prophesize('Shoko\TwitchApiBundle\Model\ValueObject\Url');
        $headers = (new Client($guzzle->reveal(), $url->reveal()))->getHeaders();
        $expected = array('Accept' => 'application/vnd.twitchtv.v3+json');

        $this->assertEquals($expected, $headers);
    }

    /**
     * Test getGuzzle method.
     */
    public function testGuzzle()
    {
        $guzzle = new Guzzle();
        $url = new Url;
        $result = (new Client($guzzle, $url))->getGuzzle();

        $this->assertInstanceOf('GuzzleHttp\Client', $result);
    }

    /**
     * Test get method.
     */
    public function testGet()
    {
        $mock     = new MockHandler([new Response(200)]);
        $handler  = HandlerStack::create($mock);
        $guzzle   = new Guzzle(['handler' => $handler]);
        $url      = new Url;
        $response = (new Client($guzzle, $url))->get('/');

        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * {@inheridoc}
     */
    protected function tearDown()
    {
        $this->prophet->checkPredictions();
    }
}
