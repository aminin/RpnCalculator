<?php

namespace RpnCalculatorTest;

use RpnCalculator\OperatorCollection;

/**
 * Test class for OperatorCollection.
 */
class OperatorCollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var OperatorCollection
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new OperatorCollection;
    }

    /**
     * @covers RpnCalculator\OperatorCollection::operatorExists
     * @dataProvider operatorExistsDataProvider
     * @param string $operator
     * @param bool   $exists
     * @param string $comment
     */
    public function testOperatorExists($operator, $exists, $comment)
    {
        $this->assertEquals($exists, $this->object->operatorExists($operator), $comment);
    }

    /**
     * @covers RpnCalculator\OperatorCollection::apply
     * @dataProvider applyDataProvider
     * @param array  $stack
     * @param string $operator
     * @param array  $expectedResult
     */
    public function testApply($stack, $operator, $expectedResult)
    {
        $this->assertEquals($expectedResult, $this->object->apply($stack, $operator));
    }

    /**
     * Передача в метод apply неизвестного оператора, приводит к броску исключения
     *
     * @expectedException \RpnCalculator\Exception
     */
    public function testApplyThrowsExceptionOnWrongOperator()
    {
        $this->object->apply(array(), '?');
    }

    public function operatorExistsDataProvider()
    {
        return array(
            array('*', true,  'Оператор умножения существует.'),
            array('?', false, 'Непонятно что за оператор. Не существует.'),
            array('+', true,  'Оператор сложения существует.'),
        );
    }

    public function applyDataProvider()
    {
        return array(
            array(array(5, 4), '*', array(20)),
            array(array(3, 24, 4), '/', array(3, 6)),
            array(array(3, 24, 4), '+', array(3, 28)),
            array(array(3, 24, 4), '-', array(3, 20)),
            array(array(3, 24, 4), "'", array(3, 24, -4)),
        );
    }
}
