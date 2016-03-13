<?php

namespace Shoko\TwitchApiBundle\Repository;
use Shoko\TwitchApiBundle\Lib\Client;

/**
 * Class ChannelRepository.
 */
class ChannelRepository extends AbstractRepository
{
    const ENDPOINT = 'channels/';

    /**
     * Get channel.
     *
     * @param string $channelId
     *
     * @return Channel
     */
    public function getChannel($channelId)
    {
        $response = $this->getClient()->get(self::ENDPOINT.$channelId);
        $data = $this->jsonResponse($response);

        return $this->getFactory()->createEntity($data);
    }

    public function getChannelToken($channelId)
    {
        $client = $this->getClient()->setUrl(Client::URL_PROTOCOL.'://'.Client::URL_HOST.'/'.Client::URL_OLD_VERSION.'/');
        $response = $this->setClient($client)->getClient()->get(self::ENDPOINT.$channelId.'/access_token');
        // reset api endpoint to current version
        $client = $this->getClient()->setUrl(Client::URL_PROTOCOL.'://'.Client::URL_HOST.'/'.Client::URL_VERSION.'/');
        $this->setClient($client);
        $data = $this->jsonResponse($response);

        return $this->getFactory()->createChannelToken($data);
    }
}
