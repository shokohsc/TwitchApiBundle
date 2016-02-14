<?php

namespace Shoko\TwitchApiBundle\Repository;

use Shoko\TwitchApiBundle\Repository\AbstractRepository;
use Shoko\TwitchApiBundle\Model\Entity\Game;

/**
 * Class GameRepository.
 */
class GameRepository extends AbstractRepository
{
    /**
     * Get top games
     * @return array
     */
    public function getTop()
    {
        $response = $this->getClient()->get(Game::ENDPOINT);
        $data = $this->jsonResponse($response);

        return $this->getFactory()->createEntity($data);
    }
}
