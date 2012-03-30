<?php

namespace RpnCalculator\Operator;

/**
 * Вместилище для общих методов операторов
 *
 * PHP 5.3
 *
 * @package    RpnCalculator
 * @subpackage Operator
 * @author     Антон Минин <anton.a.minin@gmail.com>
 * @link       https://github.com/aminin/RpnCalculator
 */
abstract class OperatorAbstract implements OperatorInterface
{
    protected $operatorToken;

    protected $description;

    /**
     * @inheritdoc
     */
    public function getToken()
    {
        return $this->operatorToken;
    }

    /**
     * @inheritdoc
     */
    public function getDescription()
    {
        return $this->description;
    }
}
