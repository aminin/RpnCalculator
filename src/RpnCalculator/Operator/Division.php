<?php

namespace RpnCalculator\Operator;

/**
 * Деление
 *
 * PHP 5.3
 *
 * @package    RpnCalculator
 * @subpackage Operator
 * @author     Антон Минин <anton.a.minin@gmail.com>
 * @link       https://github.com/aminin/RpnCalculator
 */
class Division extends BinaryOperatorAbstract
{
    protected $operatorToken = '/';
    protected $description = 'Деление';

    /**
     * @inheritdoc
     */
    public function applyBinary($a, $b)
    {
        if ($b == 0) {
            throw new Exception('Делить на ноль нельзя');
        }

        return $a / $b;
    }
}
