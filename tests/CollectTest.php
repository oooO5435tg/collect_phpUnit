<?php

use PHPUnit\Framework\TestCase;

class CollectTest extends TestCase{
    public function testCount(){
        $collect = new Collect\Collect(['a' => 13, 'b' => 17]);
        $this->assertSame(2, $collect->count());
    }

    public function testKeys()
    {
        $collect = new Collect\Collect(['a' => 13, 'b' => 17, 'c' => 20]);
        $result = $collect->keys()->toArray();
        $this->assertEquals(['a', 'b', 'c'], $result);
    }

    public function testValues()
    {
        $collect = new Collect\Collect(['a' => 13, 'b' => 17, 'c' => 20]);
        $result = $collect->values()->toArray();
        $this->assertEquals([13, 17, 20], $result);
    }

    public function testGet()
    {
        $collect = new Collect\Collect(['a' => 13, 'b' => 17, 'c' => 20]);
        $this->assertEquals(17, $collect->get('b'));
    }

    public function testExcept()
    {
        $collect = new Collect\Collect(['a' => 13, 'b' => 17, 'c' => 20, 'd' => 22]);
        $result = $collect->except('b', 'd');
        $this->assertEquals(['a' => 13, 'c' => 20], $result->toArray());
    }

    public function testOnly()
    {
        $collect = new Collect\Collect(['a' => 13, 'b' => 17, 'c' => 20, 'd' => 22]);
        $result = $collect->only('b', 'd');
        $this->assertEquals(['b' => 17, 'd' => 22], $result->toArray());
    }

    public function testFirst()
    {
        $collect = new Collect\Collect(['a' => 13, 'b' => 17, 'c' => 20]);
        $result = $collect->first();
        $this->assertEquals(13, $result);
    }

    public function testToArray()
    {
        $collect = new Collect\Collect(['a' => 13, 'b' => 17, 'c' => 20]);
        $this->assertEquals(['a' => 13, 'b' => 17, 'c' => 20], $collect->toArray());
    }

    public function testPush()
    {
        $collect = new Collect\Collect(['a' => 13, 'b' => 17, 'c' => 20]);
        $result = $collect->push(22, 'd');
        $this->assertEquals(['a' => 13, 'b' => 17, 'c' => 20, 'd' => 22], $result->toArray());
    }

    public function testUnshift()
    {
        $collect = new Collect\Collect(['a' => 13, 'b' => 17, 'c' => 20]);
        $result = $collect->unshift(0);
        $this->assertEquals([0, 'a' => 13, 'b' => 17, 'c' => 20], $result->toArray());
    }

    public function testShift()
    {
        $collect = new Collect\Collect(['a' => 13, 'b' => 17, 'c' => 20]);
        $result = $collect->shift();
        $this->assertEquals(['b' => 17, 'c' => 20], $result->toArray());
    }

    public function testPop()
    {
        $collect = new Collect\Collect(['a' => 13, 'b' => 17, 'c' => 20]);
        $result = $collect->pop();
        $this->assertEquals(['a' => 13, 'b' => 17], $result->toArray());
    }

    public function testSplice()
    {
        $collect = new Collect\Collect(['a' => 13, 'b' => 17, 'c' => 20]);
        $result = $collect->splice(['a' => 13, 'b' => 17, 'c' => 20], 1, 1);
        $this->assertSame(['b' => 17, 'c' => 20], $result->toArray());
    }
}