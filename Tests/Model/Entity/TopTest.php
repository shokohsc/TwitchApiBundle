<?php

namespace Shoko\TwitchApiBundle\Tests\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\Top;

/**
 * TopTest class.
 */
class TopTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test Get/Set, create, endpoint methods.
     */
    public function testTopEntity()
    {
        $top = Top::create();

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Top', $top);

        $this->assertEquals(array(), $top->getRanks());
        $this->assertEquals(array('some_rank'), $top->setRanks(array('some_rank'))->getRanks());

        $this->assertEquals(array(), $top->getLinks());
        $this->assertEquals(array('some_link'), $top->setLinks(array('some_link'))->getLinks());

        $this->assertEquals(0, $top->getTotal());
        $this->assertEquals(42, $top->setTotal(42)->getTotal());
    }
}
