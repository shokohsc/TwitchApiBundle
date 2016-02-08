<?php

namespace Shoko\TwitchApiBundle\Factory;

use Shoko\TwitchApiBundle\Model\Entity\MyChannel;
use Shoko\TwitchApiBundle\Factory\UserFactory;

/**
 * Class MyChannelFactory
 */
class MyChannelFactory
{
    /**
     * @param array $data
     *
     * @return MyChannel
     */
    public function createMyChannel(array $data, $myChannel = false)
    {
        if (false === $myChannel) {
            $myChannel = MyChannel::create();
        }

        $myChannel = (new ChannelFactory)->createChannel($data, $myChannel);

        if (isset($data['email'])) {
            $myChannel = $myChannel->setEmail($data['email']);
        }

        if (isset($data['stream_key'])) {
            $myChannel = $myChannel->setStreamKey($data['stream_key']);
        }

        return $myChannel;
    }
}
