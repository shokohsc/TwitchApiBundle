<?php

namespace Shoko\TwitchApiBundle\Repository;

use Shoko\TwitchApiBundle\Repository\AbstractRepository;
use Shoko\TwitchApiBundle\Model\Entity\Team;

/**
 * Class TeamRepository.
 */
class TeamRepository extends AbstractRepository
{
    public function getTeam($teamId)
    {
        $response = $this->client->get(Team::ENDPOINT.$teamId);
        $data = $this->jsonResponse($response);

        return $this->factory->createEntity($data);
    }
}
