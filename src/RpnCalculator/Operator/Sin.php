<?php

namespace RpnCalculator\Operator;

/**
 * Синус
 *
 * PHP 5.3
 *
 * @package    RpnCalculator
 * @subpackage Operator
 * @author     Антон Минин <anton.a.minin@gmail.com>
 * @link       https://github.com/aminin/RpnCalculator
 */
class Sin extends UnaryOperatorAbstract
{
    protected $operatorToken = 'sin';
    protected $description = 'Синус угла. Угол задаётся в радианах.';

    /**
     * @inheritdoc
     */
    public function applyUnary($a)
    {
        return sin($a);
    }
}
