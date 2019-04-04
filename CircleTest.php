<?php

require_once 'Circle.php';

use PHPUnit\Framework\TestCase;

class CircleTest extends TestCase
{
    /**
     * @dataProvider providerException
     */
    public function testException($radius): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Circle($radius);
    }

    /**
     * @dataProvider providerGetCircumference
     */
    public function testGetCircumference($expected, $radius): void
    {
        $obj = new Circle($radius);
        $this->assertEquals($expected, $obj->getCircumference());
    }

    /**
     * @dataProvider providerGetArea
     */
    public function testGetArea($expected, $radius): void
    {
        $obj = new Circle($radius);
        $this->assertEquals($expected, $obj->getArea());
    }

    public function providerGetArea(): array
    {
        return [
            [28.27, 3],
            [311.65, 9.96],
        ];
    }

    public function providerGetCircumference(): array
    {
        return [
            [18.85, 3],
            [62.58, 9.96],
        ];
    }

    public function providerException(): array
    {
        return [
            [-3],
            [0],
        ];
    }

}
