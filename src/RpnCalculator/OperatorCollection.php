<?php

namespace RpnCalculator;

/**
 * Набор операций
 *
 * PHP 5.3
 *
 * @package    RpnCalculator
 * @author     Антон Минин <anton.a.minin@gmail.com>
 * @link       https://github.com/aminin/RpnCalculator
 */
class OperatorCollection
{
    /**
     * Оператор сложения
     */
    const OPERATOR_SUM = '+';
    /**
     * Оператор вычитания
     */
    const OPERATOR_DIFFERENCE = '-';
    /**
     * Оператор умножения
     */
    const OPERATOR_MULTIPLICATION = '*';
    /**
     * Оператор деления
     */
    const OPERATOR_DIVISION = '/';
    /**
     * Оператор инверсии
     *
     * -3 в инфиксной нотации соответствует 3' в обратной польской
     */
    const OPERATOR_INVERSION = "'";

    private $operators = array(
        self::OPERATOR_SUM => 'sum',
        self::OPERATOR_DIFFERENCE => 'difference',
        self::OPERATOR_MULTIPLICATION => 'multiplication',
        self::OPERATOR_DIVISION => 'division',
        self::OPERATOR_INVERSION => 'inversion',
    );

    public function operatorExists($operator)
    {
        return array_key_exists($operator, $this->operators);
    }

    public function apply($stack, $operator)
    {
        if (!$this->operatorExists($operator)) {
            throw new Exception("Неизвестный оператор $operator");
        }

        if (!method_exists($this, $this->operators[$operator])) {
            throw new Exception("Не обнаружен метод для оператора $operator");
        }

        return call_user_func(array($this, $this->operators[$operator]), $stack);
    }

    public function getOperatorRegexp()
    {
        return sprintf("~[%s]~A", preg_quote(implode('', array_keys($this->operators))));
    }

    /**#@+
     * Методы реализующие операции на стеке
     *
     * @param array $stack
     * @return array
     */
    private function sum($stack)
    {
        return $this->binaryOperation($stack, '+');
    }

    private function difference($stack)
    {
        return $this->binaryOperation($stack, '-');
    }

    private function multiplication($stack)
    {
        return $this->binaryOperation($stack, '*');
    }

    private function division($stack)
    {
        return $this->binaryOperation($stack, '/');
    }

    private function inversion($stack)
    {
        $this->assertStackIsValidForUnaryOperation($stack, 'inversion');
        $a = array_pop($stack);
        array_push($stack, -$a);
        return $stack;
    }
    /**#@-*/

    private function binaryOperation($stack, $operator)
    {
        $this->assertStackIsValidForBinaryOperation($stack, self::OPERATOR_SUM);
        $b = array_pop($stack);
        $a = array_pop($stack);
        eval("\$c = $a $operator $b;");
        array_push($stack, $c);
        return $stack;
    }

    private function assertStackIsValidForBinaryOperation($stack, $message)
    {
        if (count($stack) < 2) {
            throw new Exception("Для выполнения бинарной операции недостаточно операндов: $message");
        }
    }

    private function assertStackIsValidForUnaryOperation($stack, $message)
    {
        if (count($stack) < 1) {
            throw new Exception("Для выполнения унарной операции недостаточно операндов: $message");
        }
    }
}
