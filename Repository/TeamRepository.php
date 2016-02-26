<?php

namespace Shoko\TwitchApiBundle\Repository;

/**
 * Class TeamRepository.
 */
class TeamRepository extends AbstractRepository
{
    const ENDPOINT = 'teams/';

    /**
     * Get team.
     *
     * @param string $teamId
     *
     * @return Team
     */
    public function getTeam($teamId)
    {
        $response = $this->getClient()->get(self::ENDPOINT.$teamId);
        $data = $this->jsonResponse($response);

        return $this->getFactory()->createEntity($data);
    }
}
