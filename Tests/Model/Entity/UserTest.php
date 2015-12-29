<?php

namespace Shoko\TwitchApiBundle\Tests\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\User;
use Prophecy\Prophet;

/**
 * UserTest class.
 */
class UserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Prophet $prophet
     * @var Prophet
     */
    private $prophet;

    /**
     * User $user
     * @var User
     */
    private $user;

    /**
     * {@inheridoc}
     */
    protected function setup()
    {
        $this->prophet = new Prophet;
        $this->user = new User;
    }

    public function testCreate()
    {
        $user = User::create();

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\User', $user);
    }

    /**
     * Test User endpoint method.
     */
    public function testUserEndpoint()
    {
        $this->assertEquals(User::ENDPOINT, constant(get_class($this->user).'::ENDPOINT'));
    }

    /**
     * Test Get name method.
     */
    public function testGetName()
    {
        $this->assertEquals(null, $this->user->getName());
    }

    /**
     * Test Set name method.
     */
    public function testSetName()
    {
        $this->assertEquals('some_name', $this->user->setName('some_name')->getName());
    }

    /**
     * Test Get links method.
     */
    public function testGetLinks()
    {
        $this->assertEquals(array(), $this->user->getLinks());
    }

    /**
     * Test Set links method.
     */
    public function testSetLinks()
    {
        $link = $this->prophet->prophesize('Shoko\TwitchApiBundle\Entity\ValueObject\Link');
        $this->assertEquals([$link], $this->user->setLinks([$link])->getLinks());
    }

    /**
     * {@inheridoc}
     */
    protected function tearDown()
    {
        $this->prophet->checkPredictions();
    }
}
