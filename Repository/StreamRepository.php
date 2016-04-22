<?php

namespace Shoko\TwitchApiBundle\Repository;

use Shoko\TwitchApiBundle\Factory\RankFactory;

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
     * @return StreamList
     */
    public function getStreams($params = array())
    {
        $params = 0 < count($params) ? '?'.http_build_query($params) : '';
        $response = $this->getClient()->get(self::ENDPOINT.$params);
        $data = $this->jsonResponse($response);

        return $this->getFactory()->createList($data);
    }

    /**
     * Get featured streams.
     *
     * @param array $params
     *
     * @return StreamList
     */
    public function getFeaturedStreams($params = array())
    {
        $params = 0 < count($params) ? '?'.http_build_query($params) : '';
        $response = $this->getClient()->get(self::ENDPOINT.'featured'.$params);
        $data = $this->jsonResponse($response);

        return $this->getFactory()->createFeatured($data);
    }

    /**
     * Get authenticated user streams.
     *
     * @param string $accessToken
     * @param array  $params
     *
     * @return StreamList
     */
    public function getFollowedStreams($accessToken, $params = array())
    {
        if (empty($accessToken)) {
            throw new \InvalidArgumentException('Empty access token provided', 1);
        }
        $params = 0 < count($params) ? '?'.http_build_query($params) : '';
        $response = $this->getClient()->get(self::ENDPOINT.'followed'.$params, array('Authorization' => 'OAuth '.$accessToken));
        $data = $this->jsonResponse($response);

        return $this->getFactory()->createList($data);
    }

    /**
     * Get streams summary.
     *
     * @param array $params
     *
     * @return Rank
     */
    public function getStreamsSummary($params = array())
    {
        $params = 0 < count($params) ? '?'.http_build_query($params) : '';
        $response = $this->getClient()->get(self::ENDPOINT.'summary'.$params);
        $data = $this->jsonResponse($response);

        return $this->setFactory((new RankFactory()))->getFactory()->createEntity($data);
    }
}
