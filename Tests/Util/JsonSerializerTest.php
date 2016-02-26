<?php

namespace Shoko\TwitchApiBundle\Tests\Util;

use Shoko\TwitchApiBundle\Util\JsonSerializer;
use Shoko\TwitchApiBundle\Factory\RootFactory;

/**
 * JsonSerializerTest class.
 */
class JsonSerializerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test encode method.
     */
    public function testEncode()
    {
        $serializer = new JsonSerializer();
        $expected = '{"_links":{"user":"https://api.twitch.tv/kraken/user","channel":"https://api.twitch.tv/kraken/channel","search":"https://api.twitch.tv/kraken/search","streams":"https://api.twitch.tv/kraken/streams","ingests":"https://api.twitch.tv/kraken/ingests","teams":"https://api.twitch.tv/kraken/teams"},"token":{"valid":false,"authorization":null}}';
        $root = (new RootFactory())->createEntity(json_decode($expected, true));
        $result = $serializer->encode($root);

        $result = json_decode($result);
        $expected = json_decode($expected);

        $this->assertEquals($expected->token->authorization, $result->token->authorization);
        // $this->assertEquals($expected->token->userName, $result->token->userName);
        $this->assertEquals($expected->token->valid, $result->token->valid);

        $this->assertEquals($expected->_links->user, $result->links->user);
        $this->assertEquals($expected->_links->channel, $result->links->channel);
        $this->assertEquals($expected->_links->search, $result->links->search);
        $this->assertEquals($expected->_links->streams, $result->links->streams);
        $this->assertEquals($expected->_links->ingests, $result->links->ingests);
        $this->assertEquals($expected->_links->teams, $result->links->teams);
    }
}
