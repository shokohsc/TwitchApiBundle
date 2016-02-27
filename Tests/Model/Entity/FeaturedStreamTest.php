<?php

namespace Shoko\TwitchApiBundle\Tests\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\FeaturedStream;

/**
 * FeaturedStreamTest class.
 */
class FeaturedStreamTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test Get/Set, create, endpoint methods.
     */
    public function testFeaturedStreamEntity()
    {
        $featured = FeaturedStream::create();

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\FeaturedStream', $featured);

        $this->assertEquals(null, $featured->getImage());
        $this->assertEquals('some_image', $featured->setImage('some_image')->getImage());

        $this->assertEquals(null, $featured->getText());
        $this->assertEquals('some_text', $featured->setText('some_text')->getText());

        $this->assertEquals(null, $featured->getTitle());
        $this->assertEquals('some_titlee', $featured->setTitle('some_titlee')->getTitle());

        $this->assertEquals(false, $featured->isSponsored());
        $this->assertEquals(true, $featured->setSponsored(true)->isSponsored());

        $this->assertEquals(false, $featured->isScheduled());
        $this->assertEquals(true, $featured->setScheduled(true)->isScheduled());
    }
}
