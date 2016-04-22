<?php

namespace Shoko\TwitchApiBundle\Repository;

/**
 * Class MeRepository.
 */
class MeRepository extends AbstractRepository
{
    const ENDPOINT = 'user/';

    /**
     * Get authenticated user.
     *
     * @param string $accessToken
     *
     * @return Me
     */
    public function getMe($accessToken)
    {
        if (empty($accessToken)) {
            throw new \InvalidArgumentException('Empty access token provided', 1);
        }
        $response = $this->getClient()->get(self::ENDPOINT, array('Authorization' => 'OAuth '.$accessToken));
        $data = $this->jsonResponse($response);

        return $this->getFactory()->createEntity($data);
    }
}
