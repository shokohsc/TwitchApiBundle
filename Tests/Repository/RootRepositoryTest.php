<?php

namespace Shoko\TwitchApiBundle\Tests\Repository;

use Shoko\TwitchApiBundle\Repository\RootRepository;
use Shoko\TwitchApiBundle\Factory\RootFactory;
use Shoko\TwitchApiBundle\Lib\Client;

use Prophecy\Prophet;
use Prophecy\Argument;

use GuzzleHttp\Client as Guzzle;
use Shoko\TwitchApiBundle\Model\Entity\ValueObject\Url;

/**
 * RootRepositoryTest class.
 */
class RootRepositoryTest extends \PHPUnit_Framework_TestCase
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

    /**
     * Test get root method.
     */
    public function testGetRoot()
    {
        $body = json_encode([
          'token' => [
            'valid' => false,
            'authorization' => null
          ],
          '_links' => [
            'some_key'    => 'some_value',
            'another_key' => 'another_value',
          ]
        ]);

        $client = $this->prophet->prophesize('Shoko\TwitchApiBundle\Lib\Client');
        $response = $this->prophet->prophesize('GuzzleHttp\Psr7\Response');

        $client->get(Argument::Any())->willReturn($response->reveal());
        $response->getBody()->willReturn($body);

        $factory = new RootFactory;
        $repository = new RootRepository($client->reveal(), $factory);

        $root = $repository->getRoot();

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Root', $root);
        $this->assertEquals(['valid' => false, 'authorization' => null], $root->getToken());
        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\ValueObject\Link', $root->getLinks()[0]);
        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\ValueObject\Link', $root->getLinks()[1]);
    }

    /**
     * {@inheridoc}
     */
    protected function tearDown()
    {
        $this->prophet->checkPredictions();
    }
}
