<?php

namespace RpnCalculatorTest;

use RpnCalculator\OperatorCollection;
use RpnCalculator\Calculator;
use RpnCalculator\Operator\Sin;

class CalculatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Calculator
     */
    protected $object;

    protected function setUp()
    {
        $this->object = new Calculator;
    }

    /**
     * @covers RpnCalculator\Calculator::calculate
     */
    public function testCalculate()
    {
        $this->assertEquals(55, $this->object->calculate("5 8 3 + *"), 'Пример из задания');
        $this->assertEquals(10, $this->object->calculate("32 8+4/"), 'Пример для лексера');
        $this->assertEquals(-4, $this->object->calculate("32 8'/"), 'Пример для унарной операции');
    }

    public function testSerialTokenInputMode()
    {
        $this->object->getOperatorCollection()->addOperator(new Sin);
        $this->object
            ->putToken(M_PI)
            ->putToken(6)
            ->putToken('/')
            ->putToken('sin');
        $this->assertEquals(0.5, $this->object->getStackHead());
    }

    /**
     * @covers RpnCalculator\Calculator::calculateArray
     */
    public function testCalculateArray()
    {
        $this->assertEquals(55, $this->object->calculateArray(array(5, 8, 3, '+', '*')));
    }
}
