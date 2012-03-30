# Калькулятор с обратной польской записью

## Запуск тестов

    git clone https://aminin@github.com/aminin/RpnCalculator.git
    cd RpnCalculator/test
    phpunit .

## Использование

Убедитесь что верно настроили свой [автозагрузчик](https://github.com/symfony/ClassLoader) или используйте
испольуйте автозагрузчик калькулятора.

    require_once __DIR__ . '/../src/RpnCalculator/Autoloader.php';

    RpnCalculator\Autoloader::register();

    // Режим разбора строкового выражения
    $calc = new RpnCalculator\Calculator;
    echo $calc->calculate('5 8 3 + *'), "\n";

    // Режим последовательного ввода
    $calc
        ->putToken(5)
        ->putToken(8)
        ->putToken(3)
        ->putToken(+)
        ->putToken(*);

    echo $calc->getStackHead(), "\n";
