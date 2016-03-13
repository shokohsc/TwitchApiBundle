<?php

namespace Shoko\TwitchApiBundle\Tests\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\ChannelToken;

/**
 * ChannelTokenTest class.
 */
class ChannelTokenTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test Get/Set, create, endpoint methods.
     */
    public function testChannelTokenEntity()
    {
        $channelToken = ChannelToken::create();

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\ChannelToken', $channelToken);

        $this->assertEquals(null, $channelToken->getToken());
        $this->assertEquals('some_token', $channelToken->setToken('some_token')->getToken());

        $this->assertEquals(null, $channelToken->getSig());
        $this->assertEquals('some_sig', $channelToken->setSig('some_sig')->getSig());

        $this->assertEquals(false, $channelToken->isMobileRestricted());
        $this->assertEquals(true, $channelToken->setMobileRestricted(true)->isMobileRestricted());
    }
}
