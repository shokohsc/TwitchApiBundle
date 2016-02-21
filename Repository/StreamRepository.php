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

        return $this->getFactory()->createEntity($data);
    }

    /**
     * Get streams.
     *
     * @param null|string $game
     * @param null|string $channel
     * @param null|string $limit
     * @param null|string $offset
     * @param null|string $clientId
     * @param null|string $streamType
     *
     * @return Stream
     */
    public function getStreams($game = null, $channel = null, $limit = null, $offset = null, $clientId = null, $streamType = null)
    {
        $params = '?'.http_build_query(array(
          'game' => $game,
          'channel' => $channel,
          'limit' => $limit,
          'offset' => $offset,
          'client_id' => $clientId,
          'stream_type' => $streamType,
        ));
        $response = $this->getClient()->get(Stream::ENDPOINT.$params);
        $data = $this->jsonResponse($response);

        return $this->getFactory()->createEntity($data);
    }
}
