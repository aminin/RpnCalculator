# Калькулятор с обратной польской записью

## Запуск тестов

    git clone https://aminin@github.com/aminin/RpnCalculator.git
    cd RpnCalculator/test
    phpunit .

## Использование

Убедитесь что верно настроили [автозагрузчик](https://github.com/symfony/ClassLoader) или используйте
require_once для подключения файлов калькулятора.

    require_once __DIR__ . '/../src/RpnCalculator/OperatorCollection.php';
    require_once __DIR__ . '/../src/RpnCalculator/Calculator.php';
    require_once __DIR__ . '/../src/RpnCalculator/Exception.php';
    require_once __DIR__ . '/../src/RpnCalculator/Lexer.php';


    $calc = new RpnCalculator\Calculator;
    echo $calc->calculate('5 8 3 + *'), "\n";
