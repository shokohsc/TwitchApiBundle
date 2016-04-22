<?php

namespace Shoko\TwitchApiBundle\Factory;

use Shoko\TwitchApiBundle\Model\Entity\Team;

/**
 * Class TeamFactory.
 */
class TeamFactory implements FactoryInterface
{
    /**
     * @param array $data
     * @param false|Team $team
     *
     * @return Team
     */
    public function createEntity(array $data, $team = false)
    {
        if (false === $team) {
            $team = Team::create();
        }

        if (isset($data['info'])) {
            $team = $team->setInfo($data['info']);
        }

        if (isset($data['banner'])) {
            $team = $team->setBanner($data['banner']);
        }

        if (isset($data['background'])) {
            $team = $team->setBackground($data['background']);
        }

        if (isset($data['name'])) {
            $team = $team->setName($data['name']);
        }

        if (isset($data['created_at'])) {
            $team = $team->setCreatedAt(new \DateTime($data['created_at']));
        }

        if (isset($data['updated_at'])) {
            $team = $team->setUpdatedAt(new \DateTime($data['updated_at']));
        }

        if (isset($data['_links'])) {
            $team = $team->setLinks($data['_links']);
        }

        if (isset($data['logo'])) {
            $team = $team->setLogo($data['logo']);
        }

        if (isset($data['_id'])) {
            $team = $team->setId($data['_id']);
        }

        if (isset($data['display_name'])) {
            $team = $team->setDisplayName($data['display_name']);
        }

        return $team;
    }
}
