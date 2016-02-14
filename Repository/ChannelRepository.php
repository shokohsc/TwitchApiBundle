<?php

namespace Shoko\TwitchApiBundle\Repository;

use Shoko\TwitchApiBundle\Repository\AbstractRepository;
use Shoko\TwitchApiBundle\Model\Entity\Channel;

/**
 * Class ChannelRepository.
 */
class ChannelRepository extends AbstractRepository
{
    /**
     * Get channel
     * @param  string $channelId
     * @return Channel
     */
    public function getChannel($channelId)
    {
        $response = $this->getClient()->get(Channel::ENDPOINT.$channelId);
        $data = $this->jsonResponse($response);

        return $this->getFactory()->createEntity($data);
    }
}
