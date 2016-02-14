<?php

namespace Shoko\TwitchApiBundle\Repository;

use Shoko\TwitchApiBundle\Repository\AbstractRepository;
use Shoko\TwitchApiBundle\Model\Entity\Game;

/**
 * Class GameRepository.
 */
class GameRepository extends AbstractRepository
{
    public function getTop()
    {
        $response = $this->client->get(Game::ENDPOINT);
        $data = $this->jsonResponse($response);

        return $this->factory->createEntity($data);
    }
}
