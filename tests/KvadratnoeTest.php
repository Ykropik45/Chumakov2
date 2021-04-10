<?php

use PHPUnit\Framework\TestCase;
use chumakov\Kvadratnoe;
use chumakov\ChumakovException;

class KvadratnoeTest extends TestCase
{
    /**
     * @dataProvider providerSolve
     */
    public function testSolve($a, $b, $c, $result) {
        $kvadratnoe = new Kvadratnoe();
        $this->assertEquals($result, $kvadratnoe->solve($a, $b, $c));
    }

    public function providerSolve() {
        return [
            [10, 25, 10, [-0.5, -2]],
            [0, 3, 9, [-3]],
            [1, 2, 1, [-1]]
        ];
    }

    /**
     * @dataProvider providerChumakovException
     */
    public function testChumakovException($a, $b, $c, $result) {
        $kvadratnoe = new Kvadratnoe();
        $this->expectException(ChumakovException::class);
        $this->expectExceptionMessage('No roots');
        $this->assertEquals($result, $kvadratnoe->solve($a, $b, $c));
    }

    public function providerChumakovException() {
        return [
            [5, 2, 1, [-16]],
            [8, 4, 2, [-48]]
        ];
    }
}