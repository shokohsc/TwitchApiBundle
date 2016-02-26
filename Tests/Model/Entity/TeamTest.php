<?php

namespace Shoko\TwitchApiBundle\Tests\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\Team;

/**
 * TeamTest class.
 */
class TeamTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test Get/Set, create, endpoint methods.
     */
    public function testTeamEntity()
    {
        $team = Team::create();

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Team', $team);

        $this->assertEquals(null, $team->getName());
        $this->assertEquals('some_name', $team->setName('some_name')->getName());

        $date = new \DateTime();
        $this->assertEquals(null, $team->getCreatedAt());
        $this->assertEquals($date, $team->setCreatedAt($date)->getCreatedAt());

        $this->assertEquals(null, $team->getUpdatedAt());
        $this->assertEquals($date, $team->setUpdatedAt($date)->getUpdatedAt());

        $this->assertEquals(array(), $team->getLinks());
        $link = 'some_link';
        $this->assertEquals([$link], $team->setLinks([$link])->getLinks());

        $this->assertEquals(null, $team->getLogo());
        $this->assertEquals('some_logo', $team->setLogo('some_logo')->getLogo());

        $this->assertEquals(null, $team->getId());
        $this->assertEquals('some_id', $team->setId('some_id')->getId());

        $this->assertEquals(null, $team->getDisplayName());
        $this->assertEquals('some_display_name', $team->setDisplayName('some_display_name')->getDisplayName());

        $this->assertEquals(null, $team->getInfo());
        $this->assertEquals('some_info', $team->setInfo('some_info')->getInfo());

        $this->assertEquals(null, $team->getBanner());
        $this->assertEquals('some_banner', $team->setBanner('some_banner')->getBanner());

        $this->assertEquals(null, $team->getBackground());
        $this->assertEquals('some_background', $team->setBackground('some_background')->getBackground());
    }
}
