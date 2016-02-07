<?php

namespace Shoko\TwitchApiBundle\Tests\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\MyChannel;

/**
 * MyChannelTest class.
 */
class MyChannelTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test Get/Set, create, endpoint methods.
     */
    public function testMyChannelEntity()
    {
        $myChannel = MyChannel::create();

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\MyChannel', $myChannel);

        $this->assertEquals(MyChannel::ENDPOINT, constant(get_class($myChannel).'::ENDPOINT'));

        $this->assertEquals(null, $myChannel->getName());
        $this->assertEquals('some_name', $myChannel->setName('some_name')->getName());

        $date = new \DateTime();
        $this->assertEquals(null, $myChannel->getCreatedAt());
        $this->assertEquals($date, $myChannel->setCreatedAt($date)->getCreatedAt());

        $this->assertEquals(null, $myChannel->getUpdatedAt());
        $this->assertEquals($date, $myChannel->setUpdatedAt($date)->getUpdatedAt());

        $this->assertEquals(array(), $myChannel->getLinks());
        $link = 'some_link';
        $this->assertEquals([$link], $myChannel->setLinks([$link])->getLinks());

        $this->assertEquals(null, $myChannel->getLogo());
        $this->assertEquals('some_logo', $myChannel->setLogo('some_logo')->getLogo());

        $this->assertEquals(null, $myChannel->getId());
        $this->assertEquals('some_id', $myChannel->setId('some_id')->getId());

        $this->assertEquals(null, $myChannel->getDisplayName());
        $this->assertEquals('some_display_name', $myChannel->setDisplayName('some_display_name')->getDisplayName());

        $this->assertEquals(false, $myChannel->isMature());
        $this->assertEquals(true, $myChannel->setMature(true)->isMature());

        $this->assertEquals(null, $myChannel->getStatus());
        $this->assertEquals('some_status', $myChannel->setStatus('some_status')->getStatus());

        $this->assertEquals(null, $myChannel->getBroadcasterLanguage());
        $this->assertEquals('some_broadcaster_language', $myChannel->setBroadcasterLanguage('some_broadcaster_language')->getBroadcasterLanguage());

        $this->assertEquals(null, $myChannel->getGame());
        $this->assertEquals('some_game', $myChannel->setGame('some_game')->getGame());

        $this->assertEquals(null, $myChannel->getDelay());
        $this->assertEquals('some_delay', $myChannel->setDelay('some_delay')->getDelay());

        $this->assertEquals(null, $myChannel->getLanguage());
        $this->assertEquals('some_language', $myChannel->setLanguage('some_language')->getLanguage());

        $this->assertEquals(null, $myChannel->getBanner());
        $this->assertEquals('some_banner', $myChannel->setBanner('some_banner')->getBanner());

        $this->assertEquals(null, $myChannel->getVideoBanner());
        $this->assertEquals('some_video_banner', $myChannel->setVideoBanner('some_video_banner')->getVideoBanner());

        $this->assertEquals(null, $myChannel->getBackground());
        $this->assertEquals('some_background', $myChannel->setBackground('some_background')->getBackground());

        $this->assertEquals(null, $myChannel->getProfileBanner());
        $this->assertEquals('some_profile_banner', $myChannel->setProfileBanner('some_profile_banner')->getProfileBanner());

        $this->assertEquals(null, $myChannel->getProfileBannerBackgroundColor());
        $this->assertEquals('some_profile_banner_background_color', $myChannel->setProfileBannerBackgroundColor('some_profile_banner_background_color')->getProfileBannerBackgroundColor());

        $this->assertEquals(false, $myChannel->isPartner());
        $this->assertEquals(true, $myChannel->setPartner(true)->isPartner());

        $this->assertEquals(null, $myChannel->getUrl());
        $this->assertEquals('some_url', $myChannel->setUrl('some_url')->getUrl());

        $this->assertEquals(0, $myChannel->getViews());
        $this->assertEquals(42, $myChannel->setViews(42)->getViews());

        $this->assertEquals(0, $myChannel->getFollowers());
        $this->assertEquals(42, $myChannel->setFollowers(42)->getFollowers());

        $this->assertEquals(null, $myChannel->getEmail());
        $this->assertEquals('some_email', $myChannel->setEmail('some_email')->getEmail());

        $this->assertEquals(null, $myChannel->getStreamKey());
        $this->assertEquals('some_stream_key', $myChannel->setStreamKey('some_stream_key')->getStreamKey());
    }
}
