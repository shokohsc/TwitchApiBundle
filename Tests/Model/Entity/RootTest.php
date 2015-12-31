<?php

namespace Shoko\TwitchApiBundle\Tests\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\Root;
use Prophecy\Prophet;

/**
 * RootTest class.
 */
class RootTest extends \PHPUnit_Framework_TestCase
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
     * Test Create, Endpoint, Get/Set methods.
     */
    public function testRootEntity()
    {
        $root = Root::create();

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Root', $root);

        $this->assertEquals(Root::ENDPOINT, constant(get_class($root).'::ENDPOINT'));

        $this->assertEquals(null, $root->getToken());
        $token = $this->prophet->prophesize('Shoko\TwitchApiBundle\Entity\ValueObject\Token');
        $this->assertEquals($token, $root->setToken($token)->getToken());

        $this->assertEquals(array(), $root->getLinks());
        $link = $this->prophet->prophesize('Shoko\TwitchApiBundle\Entity\ValueObject\Link');
        $this->assertEquals([$link], $root->setLinks([$link])->getLinks());
    }

    /**
     * {@inheridoc}
     */
    protected function tearDown()
    {
        $this->prophet->checkPredictions();
    }
}
