<?php

namespace Shoko\TwitchApiBundle\Factory;

use Shoko\TwitchApiBundle\Model\Entity\MyChannel;

/**
 * Class MyChannelFactory.
 */
class MyChannelFactory implements FactoryInterface
{
    /**
     * @param array $data
     * @param false|MyChannel $myChannel
     *
     * @return MyChannel
     */
    public function createEntity(array $data, $myChannel = false) : MyChannel
    {
        if (false === $myChannel) {
            $myChannel = MyChannel::create();
        }

        $myChannel = (new ChannelFactory())->createEntity($data, $myChannel);

        if (isset($data['email'])) {
            $myChannel = $myChannel->setEmail($data['email']);
        }

        if (isset($data['stream_key'])) {
            $myChannel = $myChannel->setStreamKey($data['stream_key']);
        }

        return $myChannel;
    }
}
