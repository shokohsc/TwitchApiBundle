<?php

namespace Shoko\TwitchApiBundle\Repository;

/**
 * Class StreamRepository.
 */
class StreamRepository extends AbstractRepository
{
    const ENDPOINT = 'streams/';

    /**
     * Get stream.
     *
     * @param string $channelId
     *
     * @return Stream
     */
    public function getStream($channelId)
    {
        $response = $this->getClient()->get(self::ENDPOINT.$channelId);
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
        $response = $this->getClient()->get(self::ENDPOINT.$params);
        $data = $this->jsonResponse($response);

        return $this->getFactory()->createList($data);
    }
}
