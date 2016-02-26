<?php

namespace Shoko\TwitchApiBundle\Repository;

/**
 * Class RootRepository.
 */
class RootRepository extends AbstractRepository
{
    const ENDPOINT = '';

    /**
     * Get root.
     *
     * @return Root
     */
    public function get()
    {
        $response = $this->getClient()->get(self::ENDPOINT);
        $data = $this->jsonResponse($response);

        return $this->getFactory()->createEntity($data);
    }
}
