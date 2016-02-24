<?php

namespace Shoko\TwitchApiBundle\Repository;

use Shoko\TwitchApiBundle\Model\Entity\Game;

/**
 * Class GameRepository.
 */
class GameRepository extends AbstractRepository
{
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
        $response = $this->getClient()->get(Game::ENDPOINT.'/top'.$params);
        $data = $this->jsonResponse($response);

        return $this->getFactory()->createList($data);
    }
}
