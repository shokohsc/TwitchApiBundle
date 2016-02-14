<?php

namespace Shoko\TwitchApiBundle\Repository;

use Shoko\TwitchApiBundle\Repository\AbstractRepository;
use Shoko\TwitchApiBundle\Model\Entity\Root;

/**
 * Class RootRepository.
 */
class RootRepository extends AbstractRepository
{
    public function get()
    {
        $response = $this->client->get(Root::ENDPOINT);
        $data = $this->jsonResponse($response);

        return $this->factory->createEntity($data);
    }
}
