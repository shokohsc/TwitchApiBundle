<?php

namespace Shoko\TwitchApiBundle\Tests\Model\Entity\ValueObject;

use Shoko\TwitchApiBundle\Model\Entity\ValueObject\Url;

/**
 * UrlTest class.
 */
class UrlTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test __toString method.
     */
    public function testToString()
    {
        $url = strval(new Url());
        $expected = 'https://api.twitch.tv/kraken';

        $this->assertEquals($expected, $url);
    }
}
