<?php

namespace Shoko\TwitchApiBundle\Repository;

use Shoko\TwitchApiBundle\Repository\AbstractRepository;
use Shoko\TwitchApiBundle\Model\Entity\Stream;

/**
 * Class StreamRepository.
 */
class StreamRepository extends AbstractRepository
{
    public function getStream($channelId)
    {
        $response = $this->client->get(Stream::ENDPOINT.$channelId);
        $data = $this->jsonResponse($response);

        return $this->factory->createEntity($data);
    }
}
