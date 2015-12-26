<?php

namespace Shoko\TwitchApiBundle\Tests\Model\Lists;

use Shoko\TwitchApiBundle\Model\Lists\LinkList;

/**
 * LinkListTest class.
 */
class LinkListTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test create link list method.
     */
    public function testCreate()
    {
        $data = [
          'some_key'    => 'some_value',
          'another_key' => 'another_value'
        ];

        $links = LinkList::create($data);

        $this->assertEquals('some_key', $links[0]->getKey());
        $this->assertEquals('another_value', $links[1]->getValue());
    }
}
