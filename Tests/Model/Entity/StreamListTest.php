<?php

namespace Shoko\TwitchApiBundle\Tests\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\StreamList;
use Shoko\TwitchApiBundle\Model\Entity\Stream;

/**
 * StreamListTest class.
 */
class StreamListTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test Get/Set, create, endpoint methods.
     */
    public function testStreamListEntity()
    {
        $streamList = StreamList::create();

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\StreamList', $streamList);

        $this->assertEquals(array(), $streamList->getLinks());
        $link = 'some_link';
        $this->assertEquals([$link], $streamList->setLinks([$link])->getLinks());

        $this->assertEquals(array(), $streamList->getStreams());
        $stream = new Stream();
        $this->assertEquals([$stream], $streamList->setStreams([$stream])->getStreams());

        $this->assertEquals(0, $streamList->getTotal());
        $this->assertEquals(42, $streamList->setTotal(42)->getTotal());
    }
}
