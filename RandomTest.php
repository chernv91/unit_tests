<?php

require_once 'Random.php';

use PHPUnit\Framework\TestCase;

class RandomTest extends TestCase
{

    private $obj;
    private $arr = [6, 9, 0, 7, 6, 9, 0];

    protected function setUp(): void
    {
        $this->obj = new Random(7);
    }

    /**
     * @dataProvider providerException
     */
    public function testException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Random(-3);
    }

    public function testReset(): void
    {
        $this->obj->reset();
        $result1 = $this->obj->getNext();
        $result2 = $this->obj->getNext();
        $this->assertSame($this->arr[0], $result1);
        $this->assertSame($this->arr[1], $result2);
    }

    public function testGetNext(): void
    {

        foreach ($this->arr as $key => $val) {
            $this->assertSame($this->arr[$key], $this->obj->getNext());
        }

    }

    public function providerException(): array
    {
        return [
            [-3],
            [-110],
        ];
    }

    protected function tearDown(): void
    {
        $this->obj = null;
    }
}
