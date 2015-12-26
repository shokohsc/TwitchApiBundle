<?php

namespace Shoko\TwitchApiBundle\Tests\Factory;

use Shoko\TwitchApiBundle\Factory\LinkFactory;
use Shoko\TwitchApiBundle\Model\Entity\ValueObject\Link;

/**
 * LinkFactoryTest class.
 */
class LinkFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test create link method.
     */
    public function testCreateLink()
    {
        $data = [
          'some_key' => 'some_value'
        ];

        $linkFactory = new LinkFactory;
        $link = $linkFactory->createLink($data);

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\ValueObject\Link', $link);
        $this->assertEquals('some_key', $link->getKey());
        $this->assertEquals('some_value', $link->getValue());
    }
}
