<?php

namespace Shoko\TwitchApiBundle\Factory;

use Shoko\TwitchApiBundle\Model\Entity\Me;
use Shoko\TwitchApiBundle\Factory\UserFactory;

/**
 * Class MeFactory
 */
class MeFactory extends AbstractFactory
{
    /**
     * @param array $data
     *
     * @return Me
     */
    public function createMe(array $data, $me = false)
    {
        if (false === $me) {
            $me = Me::create();
        }

        $me = (new UserFactory)->createUser($data, $me);

        if (isset($data['email'])) {
            $me = $me->setEmail($data['email']);
        }

        if (isset($data['partnered'])) {
            $me = $me->setPartnered($data['partnered']);
        }

        if (isset($data['notifications'])) {
            $me = $me->setNotifications($this->createNotifications($data['notifications']));
        }

        return $me;
    }
}
