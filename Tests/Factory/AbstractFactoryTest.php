<?php

namespace Shoko\TwitchApiBundle\Tests\Factory;

use Shoko\TwitchApiBundle\Factory\AbstractFactory;

/**
 * AbstractFactoryTest class.
 */
class AbstractFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Call protected/private method of a class.
     *
     * @param object &$object    Instantiated object that we will run method on.
     * @param string $methodName Method name to call
     * @param array  $parameters Array of parameters to pass into method.
     *
     * @return mixed Method return.
     */
    public function invokeMethod(&$object, $methodName, array $parameters = array())
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }

    /**
     * Test create links method.
     */
    public function testCreateLinks()
    {
        $data = [
          'self'    => 'https://api.twitch.tv/kraken/mes/test_me1',
          'another_key' => 'another_value',
        ];

        $abstractFactory = new AbstractFactory;
        $links = $this->invokeMethod($abstractFactory, 'createLinks', [$data]);

        $this->assertArrayHasKey('another_key', $links);
    }

    /**
     * Test create notifications method.
     */
    public function testCreateNotifications()
    {
        $data = [
          'email' => false,
          'push' => true,
        ];

        $abstractFactory = new AbstractFactory;
        $notifications = $this->invokeMethod($abstractFactory, 'createNotifications', [$data]);

        $this->assertEquals(array('email' => false, 'push' => true), $notifications);
    }
}
