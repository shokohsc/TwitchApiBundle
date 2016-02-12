<?php

namespace Shoko\TwitchApiBundle\Tests\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\Me;

/**
 * MeTest class.
 */
class MeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test Get/Set, create, endpoint methods.
     */
    public function testMeEntity()
    {
        $me = Me::create();

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Me', $me);

        $this->assertEquals(Me::ENDPOINT, constant(get_class($me).'::ENDPOINT'));

        $this->assertEquals('user', $me->getType());
        $this->assertEquals('some_type', $me->setType('some_type')->getType());

        $this->assertEquals(null, $me->getName());
        $this->assertEquals('some_name', $me->setName('some_name')->getName());

        $date = new \DateTime();
        $this->assertEquals(null, $me->getCreatedAt());
        $this->assertEquals($date, $me->setCreatedAt($date)->getCreatedAt());

        $this->assertEquals(null, $me->getUpdatedAt());
        $this->assertEquals($date, $me->setUpdatedAt($date)->getUpdatedAt());

        $this->assertEquals(array(), $me->getLinks());
        $link = 'some_link';
        $this->assertEquals([$link], $me->setLinks([$link])->getLinks());

        $this->assertEquals(null, $me->getLogo());
        $this->assertEquals('some_logo', $me->setLogo('some_logo')->getLogo());

        $this->assertEquals(null, $me->getId());
        $this->assertEquals('some_id', $me->setId('some_id')->getId());

        $this->assertEquals(null, $me->getDisplayName());
        $this->assertEquals('some_display_name', $me->setDisplayName('some_display_name')->getDisplayName());

        $this->assertEquals(null, $me->getBio());
        $this->assertEquals('some_bio', $me->setBio('some_bio')->getBio());

        $this->assertEquals(null, $me->getEmail());
        $this->assertEquals('some_email', $me->setEmail('some_email')->getEmail());

        $this->assertEquals(false, $me->isPartnered());
        $this->assertEquals(true, $me->setPartnered(true)->isPartnered());

        $this->assertEquals(array(), $me->getNotifications());
        $this->assertEquals(array('email' => true), $me->setNotifications(array('email' => true))->getNotifications());
    }
}
