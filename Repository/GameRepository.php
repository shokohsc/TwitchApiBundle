<?php

namespace Shoko\TwitchApiBundle\Repository;

/**
 * Class GameRepository.
 */
class GameRepository extends AbstractRepository
{
    const ENDPOINT = 'games';

    /**
     * Get gameList games.
     *
     * @param array $params
     *
     * @return array
     */
    public function getTop($params = array())
    {
        $params = 0 < count($params) ? '?'.http_build_query($params) : '';
        $response = $this->getClient()->get(self::ENDPOINT.'/top'.$params);
        $data = $this->jsonResponse($response);

        return $this->getFactory()->createTop($data);
    }
}
