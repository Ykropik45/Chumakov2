<?php

use PHPUnit\Framework\TestCase;
use chumakov\Lineynoe;
use chumakov\ChumakovException;

class LineynoeTest extends TestCase
{
    /**
     * @dataProvider providerSolveLine
     */
    public function testSolveLine($a, $b, $result)
    {
        $lineynoe = new Lineynoe();
        $this->assertEquals($result, $lineynoe->solveLine($a, $b));
    }

    public function providerSolveLine()
    {
        return [
            [5, 10, [-2]],
            [5, 25, [-5]]
        ];
    }

    /**
     * @dataProvider providerChumakovException
     */
    public function testChumakovException($a, $b, $result) {
        $lineynoe = new Lineynoe();
        $this->expectException(ChumakovException::class);
        $this->expectExceptionMessage('No roots');
        $this->assertEquals($result, $lineynoe->solveLine($a, $b));
    }

    public function providerChumakovException()
    {
        return [
            [0, 2, [0]],
            [0, 10, [0]]
        ];
    }
}