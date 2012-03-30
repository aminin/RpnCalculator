<?php

namespace RpnCalculator\Operator;

/**
 * Смена знака числа
 *
 * PHP 5.3
 *
 * @package    RpnCalculator
 * @subpackage Operator
 * @author     Антон Минин <anton.a.minin@gmail.com>
 * @link       https://github.com/aminin/RpnCalculator
 */
class Inversion extends UnaryOperatorAbstract
{
    protected $operatorToken = "'";
    protected $description = 'Смена знака числа';

    /**
     * @inheritdoc
     */
    public function applyUnary($a)
    {
        return -$a;
    }
}
