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
            'some_key'    => 'some_value',
            'another_key' => 'another_value',
          ]
        ];

        $rootFactory = new RootFactory;
        $root = $rootFactory->createRoot($data);
        dump($root);

        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\Root', $root);
        $this->assertEquals(null, $root->getToken());
        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\ValueObject\Link', $root->getLinks()[0]);
        $this->assertInstanceOf('Shoko\TwitchApiBundle\Model\Entity\ValueObject\Link', $root->getLinks()[1]);
    }
}
