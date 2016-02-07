<?php

namespace Shoko\TwitchApiBundle\Tests\Model\Entity;

use Shoko\TwitchApiBundle\Model\Entity\Channel;

/**
 * ChannelTest class.
 */
class ChannelTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test Get/Set, create, endpoint methods.
     */
    public function testChannelEntity()
    {
        $channel = Channel::create();

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Channel', $channel);

        $this->assertEquals(Channel::ENDPOINT, constant(get_class($channel).'::ENDPOINT'));

        $this->assertEquals(null, $channel->getName());
        $this->assertEquals('some_name', $channel->setName('some_name')->getName());

        $date = new \DateTime();
        $this->assertEquals(null, $channel->getCreatedAt());
        $this->assertEquals($date, $channel->setCreatedAt($date)->getCreatedAt());

        $this->assertEquals(null, $channel->getUpdatedAt());
        $this->assertEquals($date, $channel->setUpdatedAt($date)->getUpdatedAt());

        $this->assertEquals(array(), $channel->getLinks());
        $link = 'some_link';
        $this->assertEquals([$link], $channel->setLinks([$link])->getLinks());

        $this->assertEquals(null, $channel->getLogo());
        $this->assertEquals('some_logo', $channel->setLogo('some_logo')->getLogo());

        $this->assertEquals(null, $channel->getId());
        $this->assertEquals('some_id', $channel->setId('some_id')->getId());

        $this->assertEquals(null, $channel->getDisplayName());
        $this->assertEquals('some_display_name', $channel->setDisplayName('some_display_name')->getDisplayName());

        $this->assertEquals(false, $channel->isMature());
        $this->assertEquals(true, $channel->setMature(true)->isMature());

        $this->assertEquals(null, $channel->getStatus());
        $this->assertEquals('some_status', $channel->setStatus('some_status')->getStatus());

        $this->assertEquals(null, $channel->getBroadcasterLanguage());
        $this->assertEquals('some_broadcaster_language', $channel->setBroadcasterLanguage('some_broadcaster_language')->getBroadcasterLanguage());

        $this->assertEquals(null, $channel->getGame());
        $this->assertEquals('some_game', $channel->setGame('some_game')->getGame());

        $this->assertEquals(null, $channel->getDelay());
        $this->assertEquals('some_delay', $channel->setDelay('some_delay')->getDelay());

        $this->assertEquals(null, $channel->getLanguage());
        $this->assertEquals('some_language', $channel->setLanguage('some_language')->getLanguage());

        $this->assertEquals(null, $channel->getBanner());
        $this->assertEquals('some_banner', $channel->setBanner('some_banner')->getBanner());

        $this->assertEquals(null, $channel->getVideoBanner());
        $this->assertEquals('some_video_banner', $channel->setVideoBanner('some_video_banner')->getVideoBanner());

        $this->assertEquals(null, $channel->getBackground());
        $this->assertEquals('some_background', $channel->setBackground('some_background')->getBackground());

        $this->assertEquals(null, $channel->getProfileBanner());
        $this->assertEquals('some_profile_banner', $channel->setProfileBanner('some_profile_banner')->getProfileBanner());

        $this->assertEquals(null, $channel->getProfileBannerBackgroundColor());
        $this->assertEquals('some_profile_banner_background_color', $channel->setProfileBannerBackgroundColor('some_profile_banner_background_color')->getProfileBannerBackgroundColor());

        $this->assertEquals(false, $channel->isPartner());
        $this->assertEquals(true, $channel->setPartner(true)->isPartner());

        $this->assertEquals(null, $channel->getUrl());
        $this->assertEquals('some_url', $channel->setUrl('some_url')->getUrl());

        $this->assertEquals(0, $channel->getViews());
        $this->assertEquals(42, $channel->setViews(42)->getViews());

        $this->assertEquals(0, $channel->getFollowers());
        $this->assertEquals(42, $channel->setFollowers(42)->getFollowers());
    }
}
