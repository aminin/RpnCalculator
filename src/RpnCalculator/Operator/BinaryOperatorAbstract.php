<?php

namespace RpnCalculator\Operator;

/**
 * Бинарный оператор
 *
 * PHP 5.3
 *
 * @package    RpnCalculator
 * @subpackage Operator
 * @author     Антон Минин <anton.a.minin@gmail.com>
 * @link       https://github.com/aminin/RpnCalculator
 */
abstract class BinaryOperatorAbstract extends OperatorAbstract
{
    /**
     * @inheritdoc
     */
    public function apply(array $stack)
    {
        if (count($stack) < 2) {
            throw new Exception("Для выполнения бинарной операции недостаточно операндов");
        }
        $b = array_pop($stack);
        $a = array_pop($stack);
        array_push($stack, $this->applyBinary($a, $b));
        return $stack;
    }

    /**
     * Выполняет бинарную операцию
     *
     * @abstract
     * @param number $a
     * @param number $b
     * @return number
     */
    protected abstract function applyBinary($a, $b);
}
