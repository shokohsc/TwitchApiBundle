<?php

namespace Shoko\TwitchApiBundle\Repository;

use Shoko\TwitchApiBundle\Factory\ChannelFactory;
use Shoko\TwitchApiBundle\Factory\GameFactory;
use Shoko\TwitchApiBundle\Factory\StreamFactory;

/**
 * Class SearchRepository.
 */
class SearchRepository extends AbstractRepository
{
    const ENDPOINT = 'search/';

    /**
     * Search channels.
     *
     * @param array $params
     *
     * @return ChannelList
     */
    public function getChannels($params = array())
    {
        $params = 0 < count($params) ? '?'.http_build_query($params) : '';
        $response = $this->getClient()->get(self::ENDPOINT.'channels'.$params);
        $data = $this->jsonResponse($response);

        return $this->setFactory((new ChannelFactory()))->getFactory()->createList($data);
    }

    /**
     * Search games.
     *
     * @param array $params
     *
     * @return GameList
     */
    public function getGames($params = array())
    {
        $params = 0 < count($params) ? '?'.http_build_query($params) : '';
        $response = $this->getClient()->get(self::ENDPOINT.'games'.$params);
        $data = $this->jsonResponse($response);

        return $this->setFactory((new GameFactory()))->getFactory()->createList($data);
    }

    /**
     * Search streams.
     *
     * @param array $params
     *
     * @return StreamList
     */
    public function getStreams($params = array())
    {
        $params = 0 < count($params) ? '?'.http_build_query($params) : '';
        $response = $this->getClient()->get(self::ENDPOINT.'streams'.$params);
        $data = $this->jsonResponse($response);

        return $this->setFactory((new StreamFactory()))->getFactory()->createList($data);
    }
}
