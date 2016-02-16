<?php

namespace Shoko\TwitchApiBundle\Factory;

use Shoko\TwitchApiBundle\Model\Entity\User;

/**
 * Class UserFactory.
 */
class UserFactory implements FactoryInterface
{
    /**
     * @param array $data
     *
     * @return User
     */
    public function createEntity(array $data, $user = false)
    {
        if (false === $user) {
            $user = User::create();
        }

        if (isset($data['type'])) {
            $user = $user->setType($data['type']);
        }

        if (isset($data['name'])) {
            $user = $user->setName($data['name']);
        }

        if (isset($data['created_at'])) {
            $user = $user->setCreatedAt(new \DateTime($data['created_at']));
        }

        if (isset($data['updated_at'])) {
            $user = $user->setUpdatedAt(new \DateTime($data['updated_at']));
        }

        if (isset($data['_links'])) {
            $user = $user->setLinks($data['_links']);
        }

        if (isset($data['logo'])) {
            $user = $user->setLogo($data['logo']);
        }

        if (isset($data['_id'])) {
            $user = $user->setId($data['_id']);
        }

        if (isset($data['display_name'])) {
            $user = $user->setDisplayName($data['display_name']);
        }

        if (isset($data['bio'])) {
            $user = $user->setBio($data['bio']);
        }

        return $user;
    }
}
