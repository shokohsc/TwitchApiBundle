<?php

namespace Shoko\TwitchApiBundle\Repository;

use Shoko\TwitchApiBundle\Repository\AbstractRepository;
use Shoko\TwitchApiBundle\Model\Entity\Channel;

/**
 * Class ChannelRepository.
 */
class ChannelRepository extends AbstractRepository
{
    public function getChannel($channelId)
    {
        $response = $this->client->get(Channel::ENDPOINT.$channelId);
        $data = $this->jsonResponse($response);

        return $this->factory->createEntity($data);
    }
}
