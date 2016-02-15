<?php

namespace Shoko\TwitchApiBundle\Tests\Lib;

use Shoko\TwitchApiBundle\Repository\AbstractRepository;
use Prophecy\Prophet;

/**
 * AbstractRepositoryTest class.
 */
class AbstractRepositoryTest extends \PHPUnit_Framework_TestCase
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
     * Call protected/private method of a class.
     *
     * @param object &$object    Instantiated object that we will run method on.
     * @param string $methodName Method name to call
     * @param array  $parameters Array of parameters to pass into method.
     *
     * @return mixed Method return.
     */
    public function invokeMethod(&$object, $methodName, array $parameters = array())
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }

    /**
     * Test getters method.
     */
    public function testProperties()
    {
        $client = $this->prophet->prophesize('Shoko\TwitchApiBundle\Lib\Client');
        $factory = $this->prophet->prophesize();
        $factory->willImplement('Shoko\TwitchApiBundle\Factory\FactoryInterface');
        $transformer = $this->prophet->prophesize('Shoko\TwitchApiBundle\Util\JsonTransformer');
        $repository = new AbstractRepository($client->reveal(), $factory->reveal(), $transformer->reveal());

        $this->assertEquals($client->reveal(), $this->invokeMethod($repository, 'getClient'));
        $this->assertEquals($factory->reveal(), $this->invokeMethod($repository, 'getFactory'));
        $this->assertEquals($transformer->reveal(), $this->invokeMethod($repository, 'getTransformer'));
    }

    /**
     * Test JsonResponse method.
     */
    public function testJsonResponse()
    {
      $client = $this->prophet->prophesize('Shoko\TwitchApiBundle\Lib\Client');
      $factory = $this->prophet->prophesize();
      $factory->willImplement('Shoko\TwitchApiBundle\Factory\FactoryInterface');
      $transformer = $this->prophet->prophesize('Shoko\TwitchApiBundle\Util\JsonTransformer');
      $repository = new AbstractRepository($client->reveal(), $factory->reveal(), $transformer->reveal());

      $response = $this->prophet->prophesize('GuzzleHttp\Psr7\Response');
      $client->get('some_resource')->willReturn($response->reveal());

      $body = $this->prophet->prophesize();
      $body->willImplement('Psr\Http\Message\StreamInterface');
      $response->getBody()->willReturn($body->reveal());

      $content = '{"_links":{"user":"https://api.twitch.tv/kraken/user","channel":"https://api.twitch.tv/kraken/channel","search":"https://api.twitch.tv/kraken/search","streams":"https://api.twitch.tv/kraken/streams","ingests":"https://api.twitch.tv/kraken/ingests","teams":"https://api.twitch.tv/kraken/teams"},"token":{"valid":false,"authorization":null}}';
      $body->getContents()->willReturn($content);

      $transformer->transform($content)->willReturn(json_decode($content, true));

      $result = $this->invokeMethod($repository, 'jsonResponse', [$response->reveal()]);
      $this->assertEquals(json_decode($content, true), $result);
    }

    /**
     * {@inheridoc}.
     */
    protected function tearDown()
    {
        $this->prophet->checkPredictions();
    }
}
