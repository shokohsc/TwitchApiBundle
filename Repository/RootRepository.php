<?php

namespace Shoko\TwitchApiBundle\Repository;

use Shoko\TwitchApiBundle\Repository\AbstractRepository;
use Shoko\TwitchApiBundle\Model\Entity\Root;

/**
 * Class RootRepository.
 */
class RootRepository extends AbstractRepository
{
    /**
     * Get root
     * @return Root
     */
    public function get()
    {
        $response = $this->getClient()->get(Root::ENDPOINT);
        $data = $this->jsonResponse($response);

        return $this->getFactory()->createEntity($data);
    }
}
