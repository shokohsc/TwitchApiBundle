<?php

namespace Shoko\TwitchApiBundle\Tests\Factory;

use Shoko\TwitchApiBundle\Factory\RootFactory;
use Shoko\TwitchApiBundle\Model\Entity\Root;

/**
 * RootFactoryTest class.
 */
class RootFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test create root method.
     */
    public function testCreateRoot()
    {
        $data = [
          '_links' => [
            'some_key' => 'some_value',
            'another_key' => 'another_value',
          ],
        ];

        $rootFactory = new RootFactory();
        $root = $rootFactory->createEntity($data);

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Root', $root);
        $this->assertEquals(null, $root->getToken());
        $this->assertArrayHasKey('some_key', $root->getLinks());
        $this->assertEquals('some_value', $root->getLinks()['some_key']);
        $this->assertArrayHasKey('another_key', $root->getLinks());
        $this->assertEquals('another_value', $root->getLinks()['another_key']);
    }
}
