<?php

namespace Shoko\TwitchApiBundle\Repository;

use Shoko\TwitchApiBundle\Repository\AbstractRepository;
use Shoko\TwitchApiBundle\Model\Entity\Team;

/**
 * Class TeamRepository.
 */
class TeamRepository extends AbstractRepository
{
    /**
     * Get team
     * @param  string $teamId
     * @return Team
     */
    public function getTeam($teamId)
    {
        $response = $this->getClient()->get(Team::ENDPOINT.$teamId);
        $data = $this->jsonResponse($response);

        return $this->getFactory()->createEntity($data);
    }
}
