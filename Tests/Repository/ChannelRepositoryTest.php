<?php

namespace Shoko\TwitchApiBundle\Tests\Lib;

use Shoko\TwitchApiBundle\Repository\ChannelRepository;
use Shoko\TwitchApiBundle\Factory\ChannelFactory;
use Shoko\TwitchApiBundle\Model\Entity\Channel;
use Shoko\TwitchApiBundle\Util\JsonTransformer;
use Prophecy\Prophet;

/**
 * ChannelRepositoryTest class.
 */
class ChannelRepositoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Prophet $prophet.
     *
     * @var Prophet
     */
    private $prophet;

    /**
     * {@inheridoc}.
     */
    protected function setup()
    {
        $this->prophet = new Prophet();
    }

    /**
     * Test Get channel method.
     */
    public function testGetChannel()
    {
        $client = $this->prophet->prophesize('Shoko\TwitchApiBundle\Lib\Client');
        $factory = new ChannelFactory();
        $transformer = new JsonTransformer();
        $repository = new ChannelRepository($client->reveal(), $factory, $transformer);

        $this->assertEquals(ChannelRepository::ENDPOINT, constant(get_class($repository).'::ENDPOINT'));

        $response = $this->prophet->prophesize('GuzzleHttp\Psr7\Response');
        $client->get(ChannelRepository::ENDPOINT.'some_channel')->willReturn($response->reveal());

        $body = $this->prophet->prophesize();
        $body->willImplement('Psr\Http\Message\StreamInterface');
        $response->getBody()->willReturn($body->reveal());

        $content = '{"mature":false,"status":"TESTING  TESTING   TESTING","broadcaster_language":null,"display_name":"Test_channel","game":null,"language":"en","_id":6140842,"name":"test_channel","created_at":"2009-05-08T08:19:58Z","updated_at":"2016-02-12T00:17:18Z","delay":null,"logo":null,"banner":null,"video_banner":null,"background":null,"profile_banner":null,"profile_banner_background_color":null,"partner":false,"url":"http://www.twitch.tv/test_channel","views":211,"followers":12,"_links":{"self":"https://api.twitch.tv/kraken/channels/test_channel","follows":"https://api.twitch.tv/kraken/channels/test_channel/follows","commercial":"https://api.twitch.tv/kraken/channels/test_channel/commercial","stream_key":"https://api.twitch.tv/kraken/channels/test_channel/stream_key","chat":"https://api.twitch.tv/kraken/chat/test_channel","features":"https://api.twitch.tv/kraken/channels/test_channel/features","subscriptions":"https://api.twitch.tv/kraken/channels/test_channel/subscriptions","editors":"https://api.twitch.tv/kraken/channels/test_channel/editors","teams":"https://api.twitch.tv/kraken/channels/test_channel/teams","videos":"https://api.twitch.tv/kraken/channels/test_channel/videos"}}';
        $body->getContents()->willReturn($content);

        $result = $repository->getChannel('some_channel');
        $expected = (new ChannelFactory())->createEntity(json_decode($content, true));

        $this->assertEquals($expected, $result);
    }

    /**
     * Test Get channel access token method.
     */
    public function testGetChannelToken()
    {
        $client = $this->prophet->prophesize('Shoko\TwitchApiBundle\Lib\Client');
        $factory = new ChannelFactory();
        $transformer = new JsonTransformer();
        $repository = new ChannelRepository($client->reveal(), $factory, $transformer);

        $response = $this->prophet->prophesize('GuzzleHttp\Psr7\Response');
        $client->setUrl('https://api.twitch.tv/api/')->willReturn($client->reveal());
        $client->get(ChannelRepository::ENDPOINT.'some_channel/access_token')->willReturn($response->reveal());
        $client->setUrl('https://api.twitch.tv/kraken/')->willReturn($client->reveal());

        $body = $this->prophet->prophesize();
        $body->willImplement('Psr\Http\Message\StreamInterface');
        $response->getBody()->willReturn($body->reveal());

        $content = '{"token":"{\"user_id\":63230110,\"channel\":\"outerheaven\",\"expires\":1457884285,\"chansub\":{\"view_until\":1924905600,\"restricted_bitrates\":[]},\"private\":{\"allowed_to_view\":true},\"privileged\":false,\"source_restricted\":false}","sig":"adbdf04778026937b1f09584332cce3cc472cb82","mobile_restricted":true}';
        $body->getContents()->willReturn($content);

        $result = $repository->getChannelToken('some_channel');
        $expected = (new ChannelFactory())->createChannelToken(json_decode($content, true));

        $this->assertEquals($expected, $result);
    }

    /**
     * {@inheridoc}.
     */
    protected function tearDown()
    {
        $this->prophet->checkPredictions();
    }
}
