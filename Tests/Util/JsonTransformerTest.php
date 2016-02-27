<?php

namespace Shoko\TwitchApiBundle\Tests\Util;

use Shoko\TwitchApiBundle\Util\JsonTransformer;

/**
 * JsonTransformerTest class.
 */
class JsonTransformerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test transform method.
     */
    public function testTransform()
    {
        $transformer = new JsonTransformer();
        $json = '{"some_key":"some_value"}';
        $expected = ['some_key' => 'some_value'];
        $result = $transformer->transform($json);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test invalid argument exception.
     *
     * @expectedException InvalidArgumentException
     */
    public function testInvalidArgumentException()
    {
        $transformer = new JsonTransformer();
        $json = 42;
        $transformer->transform($json);
    }

    /**
     * Test checkDecodedJson method.
     *
     * @expectedException Shoko\TwitchApiBundle\Exception\JsonTransformerException
     */
    public function testCheckDecodedJson()
    {
        $transformer = new JsonTransformer();
        $json = '{"some_key""some_value"}';
        $transformer->transform($json);
    }
}
