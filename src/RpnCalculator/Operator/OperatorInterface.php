<?php

namespace RpnCalculator\Operator;

/**
 * Оператор
 *
 * PHP 5.3
 *
 * @package    RpnCalculator
 * @subpackage Operator
 * @author     Антон Минин <anton.a.minin@gmail.com>
 * @link       https://github.com/aminin/RpnCalculator
 */
interface OperatorInterface
{
    /**
     * Применить оператор к стеку
     *
     * @abstract
     * @param array $stack
     * @return array стек после применения оператора
     */
    public function apply(array $stack);

    /**
     * Возвращает токен операции, например "+" "-" или "*"
     *
     * @abstract
     * @return string
     */
    public function getToken();

    /**
     * Человекопонятное описание оператора
     *
     * @abstract
     * @return string
     */
    public function getDescription();
}
