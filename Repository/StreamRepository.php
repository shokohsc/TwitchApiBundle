<?php

namespace Shoko\TwitchApiBundle\Repository;

use Shoko\TwitchApiBundle\Repository\AbstractRepository;
use Shoko\TwitchApiBundle\Model\Entity\Stream;

/**
 * Class StreamRepository.
 */
class StreamRepository extends AbstractRepository
{
    /**
     * Get stream
     * @param  string $channelId
     * @return Stream
     */
    public function getStream($channelId)
    {
        $response = $this->getClient()->get(Stream::ENDPOINT.$channelId);
        $data = $this->jsonResponse($response);

        return $this->getFactory()->createEntity($data);
    }
}
