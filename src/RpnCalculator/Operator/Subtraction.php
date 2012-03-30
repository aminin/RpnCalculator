<?php

namespace RpnCalculator\Operator;

/**
 * Вычитание
 *
 * PHP 5.3
 *
 * @package    RpnCalculator
 * @subpackage Operator
 * @author     Антон Минин <anton.a.minin@gmail.com>
 * @link       https://github.com/aminin/RpnCalculator
 */
class Subtraction extends BinaryOperatorAbstract
{
    protected $operatorToken = '-';
    protected $description = 'Вычитание';

    /**
     * @inheritdoc
     */
    public function applyBinary($a, $b)
    {
        return $a - $b;
    }
}
