<?php

namespace Shoko\TwitchApiBundle\Tests\Factory;

use Shoko\TwitchApiBundle\Factory\TeamFactory;
use Shoko\TwitchApiBundle\Model\Entity\Team;

/**
 * TeamFactoryTest class.
 */
class TeamFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test create team method.
     */
    public function testCreateTeam()
    {
        $data = [
          'name' => 'test_team1',
          'created_at' => '2011-06-03T17:49:19Z',
          'updated_at' => '2012-06-18T17:19:57Z',
          '_links' => [
            'self' => 'https://api.twitch.tv/kraken/teams/test_team1',
            'another_key' => 'another_value',
          ],
          'logo' => 'http://static-cdn.jtvnw.net/jtv_team_pictures/test_team1-profile_image-62e8318af864d6d7-300x300.jpeg',
          '_id' => 21229404,
          'display_name' => 'test_team1',
          'info' => 'test info',
          'banner' => 'some_banner_link',
          'background' => 'some_background',
        ];

        $teamFactory = new TeamFactory();
        $team = $teamFactory->createEntity($data);

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Team', $team);
        $this->assertEquals('test_team1', $team->getName());
        $this->assertEquals(new \DateTime('2011-06-03T17:49:19Z'), $team->getCreatedAt());
        $this->assertEquals(new \DateTime('2012-06-18T17:19:57Z'), $team->getUpdatedAt());
        $this->assertArrayHasKey('self', $team->getLinks());
        $this->assertEquals('https://api.twitch.tv/kraken/teams/test_team1', $team->getLinks()['self']);
        $this->assertArrayHasKey('another_key', $team->getLinks());
        $this->assertEquals('another_value', $team->getLinks()['another_key']);
        $this->assertEquals('http://static-cdn.jtvnw.net/jtv_team_pictures/test_team1-profile_image-62e8318af864d6d7-300x300.jpeg', $team->getLogo());
        $this->assertEquals(21229404, $team->getId());
        $this->assertEquals('test_team1', $team->getDisplayName());
        $this->assertEquals('test info', $team->getInfo());
        $this->assertEquals('some_banner_link', $team->getBanner());
        $this->assertEquals('some_background', $team->getBackground());
    }
}
