<?php

namespace Shoko\TwitchApiBundle\Factory;

use Shoko\TwitchApiBundle\Model\Entity\Channel;
use Shoko\TwitchApiBundle\Factory\FactoryInterface;

/**
 * Class ChannelFactory.
 */
class ChannelFactory implements FactoryInterface
{
    /**
     * @param array $data
     *
     * @return Channel
     */
    public function createEntity(array $data, $channel = false)
    {
        if (false === $channel) {
            $channel = Channel::create();
        }

        if (isset($data['mature'])) {
            $channel = $channel->setMature($data['mature']);
        }

        if (isset($data['status'])) {
            $channel = $channel->setStatus($data['status']);
        }

        if (isset($data['broadcaster_language'])) {
            $channel = $channel->setBroadcasterLanguage($data['broadcaster_language']);
        }

        if (isset($data['game'])) {
            $channel = $channel->setGame($data['game']);
        }

        if (isset($data['delay'])) {
            $channel = $channel->setDelay($data['delay']);
        }

        if (isset($data['language'])) {
            $channel = $channel->setLanguage($data['language']);
        }

        if (isset($data['banner'])) {
            $channel = $channel->setBanner($data['banner']);
        }

        if (isset($data['video_banner'])) {
            $channel = $channel->setVideoBanner($data['video_banner']);
        }

        if (isset($data['background'])) {
            $channel = $channel->setBackground($data['background']);
        }

        if (isset($data['profile_banner'])) {
            $channel = $channel->setProfileBanner($data['profile_banner']);
        }

        if (isset($data['profile_banner_background_color'])) {
            $channel = $channel->setProfileBannerBackgroundColor($data['profile_banner_background_color']);
        }

        if (isset($data['partner'])) {
            $channel = $channel->setPartner($data['partner']);
        }

        if (isset($data['url'])) {
            $channel = $channel->setUrl($data['url']);
        }

        if (isset($data['views'])) {
            $channel = $channel->setViews($data['views']);
        }

        if (isset($data['followers'])) {
            $channel = $channel->setFollowers($data['followers']);
        }

        if (isset($data['name'])) {
            $channel = $channel->setName($data['name']);
        }

        if (isset($data['created_at'])) {
            $channel = $channel->setCreatedAt(new \DateTime($data['created_at']));
        }

        if (isset($data['updated_at'])) {
            $channel = $channel->setUpdatedAt(new \DateTime($data['updated_at']));
        }

        if (isset($data['_links'])) {
            $channel = $channel->setLinks($data['_links']);
        }

        if (isset($data['logo'])) {
            $channel = $channel->setLogo($data['logo']);
        }

        if (isset($data['_id'])) {
            $channel = $channel->setId($data['_id']);
        }

        if (isset($data['display_name'])) {
            $channel = $channel->setDisplayName($data['display_name']);
        }

        return $channel;
    }
}
