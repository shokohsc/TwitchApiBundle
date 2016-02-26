<?php

namespace Shoko\TwitchApiBundle\Tests\Lib;

use Shoko\TwitchApiBundle\Repository\TeamRepository;
use Shoko\TwitchApiBundle\Factory\TeamFactory;
use Shoko\TwitchApiBundle\Model\Entity\Team;
use Shoko\TwitchApiBundle\Util\JsonTransformer;
use Prophecy\Prophet;

/**
 * TeamRepositoryTest class.
 */
class TeamRepositoryTest extends \PHPUnit_Framework_TestCase
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
     * Test Get team method.
     */
    public function testGetTeam()
    {
        $client = $this->prophet->prophesize('Shoko\TwitchApiBundle\Lib\Client');
        $factory = new TeamFactory();
        $transformer = new JsonTransformer();
        $repository = new TeamRepository($client->reveal(), $factory, $transformer);

        $this->assertEquals(TeamRepository::ENDPOINT, constant(get_class($repository).'::ENDPOINT'));

        $response = $this->prophet->prophesize('GuzzleHttp\Psr7\Response');
        $client->get(TeamRepository::ENDPOINT.'some_team')->willReturn($response->reveal());

        $body = $this->prophet->prophesize();
        $body->willImplement('Psr\Http\Message\StreamInterface');
        $response->getBody()->willReturn($body->reveal());

        $content = '{"_id":2,"name":"eg","info":"Team Info\n\n","display_name":"Evil Geniuses","created_at":"2011-10-11T23:59:43Z","updated_at":"2015-11-17T23:23:08Z","logo":"https://static-cdn.jtvnw.net/jtv_user_pictures/team-eg-team_logo_image-360dfbc1fd826286-300x300.png","banner":"https://static-cdn.jtvnw.net/jtv_user_pictures/team-eg-banner_image-713b52204a0f9da0-640x125.png","background":"https://static-cdn.jtvnw.net/jtv_user_pictures/team-eg-background_image-39a8866f3f6634bc.png","_links":{"self":"https://api.twitch.tv/kraken/teams/eg"}}';
        $body->getContents()->willReturn($content);

        $result = $repository->getTeam('some_team');
        $expected = (new TeamFactory())->createEntity(json_decode($content, true));

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
