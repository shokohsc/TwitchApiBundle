<?php

namespace Shoko\TwitchApiBundle\Tests\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\User;

/**
 * UserTest class.
 */
class UserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test Get/Set, create, endpoint methods.
     */
    public function testUserEntity()
    {
        $user = User::create();

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\User', $user);

        $this->assertEquals('user', $user->getType());
        $this->assertEquals('some_type', $user->setType('some_type')->getType());

        $this->assertEquals(null, $user->getName());
        $this->assertEquals('some_name', $user->setName('some_name')->getName());

        $date = new \DateTime();
        $this->assertEquals(null, $user->getCreatedAt());
        $this->assertEquals($date, $user->setCreatedAt($date)->getCreatedAt());

        $this->assertEquals(null, $user->getUpdatedAt());
        $this->assertEquals($date, $user->setUpdatedAt($date)->getUpdatedAt());

        $this->assertEquals(array(), $user->getLinks());
        $link = 'some_link';
        $this->assertEquals([$link], $user->setLinks([$link])->getLinks());

        $this->assertEquals(null, $user->getLogo());
        $this->assertEquals('some_logo', $user->setLogo('some_logo')->getLogo());

        $this->assertEquals(null, $user->getId());
        $this->assertEquals('some_id', $user->setId('some_id')->getId());

        $this->assertEquals(null, $user->getDisplayName());
        $this->assertEquals('some_display_name', $user->setDisplayName('some_display_name')->getDisplayName());

        $this->assertEquals(null, $user->getBio());
        $this->assertEquals('some_bio', $user->setBio('some_bio')->getBio());
    }
}
