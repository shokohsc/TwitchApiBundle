<?php

namespace Shoko\TwitchApiBundle\Tests\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\Featured;

/**
 * FeaturedTest class.
 */
class FeaturedTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test Get/Set, create, endpoint methods.
     */
    public function testFeaturedEntity()
    {
        $featured = Featured::create();

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Featured', $featured);

        $this->assertEquals(array(), $featured->getFeatureds());
        $this->assertEquals(array('some_featured'), $featured->setFeatureds(array('some_featured'))->getFeatureds());

        $this->assertEquals(array(), $featured->getLinks());
        $this->assertEquals(array('some_link'), $featured->setLinks(array('some_link'))->getLinks());
    }
}
