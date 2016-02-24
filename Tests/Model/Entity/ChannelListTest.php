<?php

namespace Shoko\TwitchApiBundle\Tests\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\ChannelList;
use Shoko\TwitchApiBundle\Model\Entity\Channel;

/**
 * ChannelListTest class.
 */
class ChannelListTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test Get/Set, create, endpoint methods.
     */
    public function testChannelListEntity()
    {
        $channelList = ChannelList::create();

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\ChannelList', $channelList);

        $this->assertEquals(array(), $channelList->getLinks());
        $link = 'some_link';
        $this->assertEquals([$link], $channelList->setLinks([$link])->getLinks());

        $this->assertEquals(array(), $channelList->getChannels());
        $channel = new Channel();
        $this->assertEquals([$channel], $channelList->setChannels([$channel])->getChannels());

        $this->assertEquals(0, $channelList->getTotal());
        $this->assertEquals(42, $channelList->setTotal(42)->getTotal());
    }
}
