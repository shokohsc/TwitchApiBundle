<?php

namespace Shoko\TwitchApiBundle\Repository;

use Shoko\TwitchApiBundle\Repository\AbstractRepository;

/**
 * Class ChannelRepository.
 */
class ChannelRepository extends AbstractRepository
{
    public function getChannel($channelId)
    {
        $response = $this->client->get($channelId);
        $data = $this->jsonResponse($response);

        return $this->factory->createEntity($data);
    }
}
