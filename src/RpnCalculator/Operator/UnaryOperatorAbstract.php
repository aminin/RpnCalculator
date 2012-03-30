<?php

namespace RpnCalculator\Operator;

/**
 * Абстрактный унарный оператор
 *
 * PHP 5.3
 *
 * @package    RpnCalculator
 * @subpackage Operator
 * @author     Антон Минин <anton.a.minin@gmail.com>
 * @link       https://github.com/aminin/RpnCalculator
 */
abstract class UnaryOperatorAbstract extends OperatorAbstract
{
    /**
     * @inheritdoc
     */
    public function apply(array $stack)
    {
        if (count($stack) < 1) {
            throw new Exception("Для выполнения унарной операции недостаточно операндов");
        }
        $a = array_pop($stack);
        array_push($stack, $this->applyUnary($a));
        return $stack;
    }

    /**
     * Выполняет унарную операцию
     *
     * @abstract
     * @param number $a
     * @param number
     */
    protected abstract function applyUnary($a);
}
