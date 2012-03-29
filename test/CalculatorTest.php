<?php

namespace RpnCalculatorTest;

use RpnCalculator\OperatorCollection;
use RpnCalculator\Calculator;

/**
 * Test class for Calculator.
 */
class CalculatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Calculator
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
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

    /**
     * @covers RpnCalculator\Calculator::calculateArray
     */
    public function testCalculateArray()
    {
        $this->assertEquals(55, $this->object->calculateArray(array(5, 8, 3, '+', '*')));
    }
}
