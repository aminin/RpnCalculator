<?php

namespace RpnCalculator;

/**
 * Анализатор строковых выражений с обратной польской записью
 *
 * PHP 5.3
 *
 * @package    RpnCalculator
 * @author     Антон Минин <anton.a.minin@gmail.com>
 * @link       https://github.com/aminin/RpnCalculator
 */
class Lexer
{
    private $tokens = array(
        'operator'   => '~[\+\*\-\/]~A',
        'number'     => '~\d+(?:\.\d+)?~A',
        'whitespace' => '~\s+~A',
    );

    /**
     * Позволяет настроить набор операций, определяемых при анализе выражения
     *
     * @param string $operatorRegexp
     * @return Lexer
     */
    public function setOperatorRegexp($operatorRegexp)
    {
        $this->tokens['operator'] = $operatorRegexp;
        return $this;
    }

    /**
     * Преобразует строку с обратной польской записью в массив токенов
     *
     * @param string $input
     * @return array
     * @throws Exception
     */
    public function tokenize($input)
    {
        $length = strlen($input);
        $lastPosition = $position = 0;
        $tokens = array();

        while ($position < $length) {
            if (
                preg_match($this->tokens['operator'], $input, $match, null, $position)
                || preg_match($this->tokens['number'], $input, $match, null, $position)
            ) {
                $tokens[] = $match[0];
                $position += strlen($match[0]);
            } else if (preg_match($this->tokens['whitespace'], $input, $match, null, $position)) {
                $position += strlen($match[0]);
            } else {
                throw new Exception(sprintf("Неизвестный символ в строке '%s' в позиции %d", $input, $position));
            }

            if ($lastPosition >= $position) {
                throw new Exception(sprintf("Зацикливание лексера в строке '%s' в позиции %d", $input, $position));
            }
        }

        return $tokens;
    }
}
