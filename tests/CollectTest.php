<?php

use PHPUnit\Framework\TestCase;

class CollectTest extends TestCase{
    public function testCount(){
        $collect = new Collect\Collect([13,17]);
        $this->assertSame(2, $collect->count());
    }

    public function testKeys()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $keys = $collect->keys()->toArray();
        $this->assertEquals(['a', 'b', 'c'], $keys);
    }

    public function testValues()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $values = $collect->values()->toArray();
        $this->assertEquals([1, 2, 3], $values);
    }

    public function testGet()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertEquals(2, $collect->get('b'));
        $this->assertEquals(['a' => 1, 'b' => 2, 'c' => 3], $collect->get());
    }

    public function testExcept()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4]);
        $this->assertEquals(['a' => 1, 'c' => 3], $collect->except('b', 'd')->toArray());
        $this->assertEquals(['a' => 1, 'c' => 3], $collect->except(['b', 'd'])->toArray());
    }

    public function testOnly()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4]);
        $this->assertEquals(['b' => 2, 'd' => 4], $collect->only('b', 'd')->toArray());
        $this->assertEquals(['b' => 2, 'd' => 4], $collect->only(['b', 'd'])->toArray());
    }

    public function testFirst()
    {
        $collect = new Collect\Collect([13, 17, 42]);
        $result = $collect->first();
        $this->assertEquals(13, $result);
    }

    public function testToArray()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertEquals(['a' => 1, 'b' => 2, 'c' => 3], $collect->toArray());
    }

    public function testPush()
    {
        $collect = new Collect\Collect(['a' => 13, 'b' => 14, 'c' => 15]);
        $collect->push(16, 'd');
        $this->assertEquals(['a' => 13, 'b' => 14, 'c' => 15, 'd' => 16], $collect->toArray());
    }

    public function testUnshift()
    {
        $collect = new Collect\Collect([1, 2, 3]);
        $collect->unshift(0);
        $this->assertEquals([0, 1, 2, 3], $collect->toArray());
    }

    public function testShift()
    {
        $collect = new Collect\Collect([1, 2, 3]);
        $collect->shift();
        $this->assertEquals([2, 3], $collect->toArray());
    }

    public function testPop()
    {
        $collect = new Collect\Collect([1, 2, 3]);
        $collect->pop();
        $this->assertEquals([1, 2], $collect->toArray());
    }

    public function testSplice()
    {
        $collect = new Collect\Collect(['a' => 13, 'b' => 17, 'c' => 20]);
        $collect = $collect->except(['b']);
        $this->assertSame(['a' => 13, 'c' => 20], $collect->toArray());
    }
}