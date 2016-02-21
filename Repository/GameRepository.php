<?php

namespace Shoko\TwitchApiBundle\Repository;

use Shoko\TwitchApiBundle\Model\Entity\Game;

/**
 * Class GameRepository.
 */
class GameRepository extends AbstractRepository
{
    /**
     * Get top games.
     *
     * @param string $limit
     * @param string $offset
     *
     * @return array
     */
    public function getTop($limit = '10', $offset = '0')
    {
        $params = '?'.http_build_query(array('limit' => $limit, 'offset' => $offset));
        $response = $this->getClient()->get(Game::ENDPOINT.$params);
        $data = $this->jsonResponse($response);

        return $this->getFactory()->createTop($data);
    }
}
