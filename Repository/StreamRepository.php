<?php

namespace Shoko\TwitchApiBundle\Repository;

use Shoko\TwitchApiBundle\Model\Entity\Stream;

/**
 * Class StreamRepository.
 */
class StreamRepository extends AbstractRepository
{
    /**
     * Get stream.
     *
     * @param string $channelId
     *
     * @return Stream
     */
    public function getStream($channelId)
    {
        $response = $this->getClient()->get(Stream::ENDPOINT.$channelId);
        $data = $this->jsonResponse($response);
        $data = null !== $data['stream'] ? $data['stream'] : [];

        return $this->getFactory()->createEntity($data);
    }

    /**
     * Get streams.
     *
     * @param array $params
     *
     * @return Stream
     */
    public function getStreams($params = array())
    {
        $params = 0 < count($params) ? '?'.http_build_query($params) : '';
        $response = $this->getClient()->get(Stream::ENDPOINT.$params);
        $data = $this->jsonResponse($response);

        return $this->getFactory()->createList($data);
    }
}
