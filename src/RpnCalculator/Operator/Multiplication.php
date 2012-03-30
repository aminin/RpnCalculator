<?php

namespace RpnCalculator\Operator;

/**
 * Умножение
 *
 * PHP 5.3
 *
 * @package    RpnCalculator
 * @subpackage Operator
 * @author     Антон Минин <anton.a.minin@gmail.com>
 * @link       https://github.com/aminin/RpnCalculator
 */
class Multiplication extends BinaryOperatorAbstract
{
    protected $operatorToken = '*';
    protected $description = 'Умножение';

    /**
     * @inheritdoc
     */
    public function applyBinary($a, $b)
    {
        return $a * $b;
    }
}
