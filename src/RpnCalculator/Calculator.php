<?php

namespace RpnCalculator;

/**
 * Калькулятор для выражений с обратной польской записью
 *
 * PHP 5.3
 *
 * @package    RpnCalculator
 * @author     Антон Минин <anton.a.minin@gmail.com>
 * @link       https://github.com/aminin/RpnCalculator
 */
class Calculator
{
    /**
     * @var array
     */
    private $stack = array();

    /**
     * @var OperatorCollection
     */
    private $operatorCollection;

    /**
     * @var Lexer
     */
    private $lexer;

    public function __construct()
    {
        $this->operatorCollection = new OperatorCollection;
        $this->lexer = new Lexer;
    }

    public function setOperatorCollection(OperatorCollection $operatorCollection)
    {
        $this->operatorCollection = $operatorCollection;
        return $this;
    }

    public function getOperatorCollection()
    {
        return $this->operatorCollection;
    }

    public function setLexer(Lexer $lexer)
    {
        $this->lexer = $lexer;
        return $this;
    }

    /**
     * Вычисляет выражение с обратной польской записью, представленное в виде строки
     *
     * @param string $rpnString
     * @return number
     */
    public function calculate($rpnString)
    {
        $this->lexer->setOperatorRegexp($this->operatorCollection->getOperatorRegexp());
        $rpnArray = $this->lexer->tokenize($rpnString);
        return $this->calculateArray($rpnArray);
    }

    /**
     * Вычисляет выражение с обратной польской записью, представленное в виде массива
     *
     * Возвращает крайний элемент стeка.
     * TODO Проверить что покажет на экране Электроника МК-61 для "8 7 3 +"
     *
     * @param array $rpnArray
     * @return number
     */
    public function calculateArray($rpnArray)
    {
        $this->stack = array();

        foreach ($rpnArray as $token) {
            $this->putToken($token);
        }

        return $this->getStackHead();
    }

    /**
     * @param mixed $token
     * @return Calculator
     */
    public function putToken($token)
    {
        $token = trim($token);

        if (is_numeric($token)) {
            $this->stack[] = $token;
        } else {
            $this->stack = $this->operatorCollection->apply($this->stack, $token);
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStackHead()
    {
        return end($this->stack);
    }
}
