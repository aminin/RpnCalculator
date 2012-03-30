<?php

namespace RpnCalculator;

/**
 * Автозагрузчик
 *
 * PHP 5.3
 *
 * @package    RpnCalculator
 * @author     Антон Минин <anton.a.minin@gmail.com>
 * @link       https://github.com/aminin/RpnCalculator
 */
class Autoloader
{
    /**
     * Добавляет Autoloader в число автозагрузчиков SPL.
     */
    static public function register()
    {
        spl_autoload_register(array(new self, 'autoload'));
    }

    /**
     * Обрабатывает автозагрузку классов.
     *
     * @param  string  $class  имя класса
     * @return boolean Возвращает true если класс был загружен
     */
    static public function autoload($class)
    {
        $class = preg_replace('~^\\\\(.*)~', '\\1', $class);

        if (0 !== strpos($class, __NAMESPACE__)) {
            return;
        }

        $file = sprintf(
            '%s/../%s.php',
            __DIR__,
            str_replace(array('\\', "\0"), array(DIRECTORY_SEPARATOR, ''), $class)
        );

        if (is_file($file)) {
            require $file;
        }
    }
}
