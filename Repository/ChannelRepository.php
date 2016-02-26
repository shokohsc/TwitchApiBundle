<?php

namespace Shoko\TwitchApiBundle\Repository;

/**
 * Class ChannelRepository.
 */
class ChannelRepository extends AbstractRepository
{
    const ENDPOINT = 'channels/';

    /**
     * Get channel.
     *
     * @param string $channelId
     *
     * @return Channel
     */
    public function getChannel($channelId)
    {
        $response = $this->getClient()->get(self::ENDPOINT.$channelId);
        $data = $this->jsonResponse($response);

        return $this->getFactory()->createEntity($data);
    }
}
