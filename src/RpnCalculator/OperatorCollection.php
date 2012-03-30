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
    private $operators = array();

    public function __construct()
    {
        $this
            ->addOperator(new Operator\Addition)
            ->addOperator(new Operator\Subtraction)
            ->addOperator(new Operator\Multiplication)
            ->addOperator(new Operator\Division)
            ->addOperator(new Operator\Inversion);
    }

    public function addOperator(Operator\OperatorInterface $operator)
    {
        $this->operators[$operator->getToken()] = $operator;
        return $this;
    }

    public function clearOperators()
    {
        $this->operators = array();
        return $this;
    }

    /**
     * @return Operator\OperatorInterface
     */
    public function getOperators()
    {
        return $this->operators;
    }

    public function operatorExists($operator)
    {
        return array_key_exists($operator, $this->operators);
    }

    public function apply($stack, $operator)
    {
        if (!$this->operatorExists($operator)) {
            throw new Exception("Неизвестный оператор $operator");
        }

        return $this->operators[$operator]->apply($stack);
    }

    public function getOperatorRegexp()
    {
        return sprintf(
            "~(?:%s)~A",
            implode(')|(?:', array_map('preg_quote', array_keys($this->operators)))
        );
    }
}
