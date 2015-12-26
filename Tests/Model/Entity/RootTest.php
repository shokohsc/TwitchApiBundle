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
     * Root $root
     * @var Root
     */
    private $root;

    /**
     * {@inheridoc}
     */
    protected function setup()
    {
        $this->prophet = new Prophet;
        $this->root = new Root;
    }

    public function testCreate()
    {
        $root = Root::create();

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Root', $root);
    }

    /**
     * Test Root endpoint method.
     */
    public function testRootEndpoint()
    {
        $this->assertEquals(Root::ENDPOINT, constant(get_class($this->root).'::ENDPOINT'));
    }

    /**
     * Test Get token method.
     */
    public function testGetToken()
    {
        $this->assertEquals(null, $this->root->getToken());
    }

    /**
     * Test Set token method.
     */
    public function testSetToken()
    {
        $token = $this->prophet->prophesize('Shoko\TwitchApiBundle\Entity\ValueObject\Token');
        $this->assertEquals($token, $this->root->setToken($token)->getToken());
    }

    /**
     * Test Get links method.
     */
    public function testGetLinks()
    {
        $this->assertEquals(array(), $this->root->getLinks());
    }

    /**
     * Test Set links method.
     */
    public function testSetLinks()
    {
        $link = $this->prophet->prophesize('Shoko\TwitchApiBundle\Entity\ValueObject\Link');
        $this->assertEquals([$link], $this->root->setLinks([$link])->getLinks());
    }

    /**
     * {@inheridoc}
     */
    protected function tearDown()
    {
        $this->prophet->checkPredictions();
    }
}
