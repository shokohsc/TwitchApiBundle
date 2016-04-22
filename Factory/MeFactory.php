<?php

namespace Shoko\TwitchApiBundle\Factory;

use Shoko\TwitchApiBundle\Model\Entity\Me;

/**
 * Class MeFactory.
 */
class MeFactory implements FactoryInterface
{
    /**
     * @param array $data
     * @param false|Me $me
     *
     * @return Me
     */
    public function createEntity(array $data, $me = false)
    {
        if (false === $me) {
            $me = Me::create();
        }

        $me = (new UserFactory())->createEntity($data, $me);

        if (isset($data['email'])) {
            $me = $me->setEmail($data['email']);
        }

        if (isset($data['partnered'])) {
            $me = $me->setPartnered($data['partnered']);
        }

        if (isset($data['notifications'])) {
            $me = $me->setNotifications($data['notifications']);
        }

        return $me;
    }
}
