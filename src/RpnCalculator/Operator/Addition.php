<?php

namespace RpnCalculator\Operator;

/**
 * Сложение
 *
 * PHP 5.3
 *
 * @package    RpnCalculator
 * @subpackage Operator
 * @author     Антон Минин <anton.a.minin@gmail.com>
 * @link       https://github.com/aminin/RpnCalculator
 */
class Addition extends BinaryOperatorAbstract
{
    protected $operatorToken = '+';
    protected $description = 'Сложение';

    /**
     * @inheritdoc
     */
    public function applyBinary($a, $b)
    {
        return $a + $b;
    }
}
