<?php

require_once __DIR__ . "/../src/RpnCalculator/Autoloader.php";

RpnCalculator\Autoloader::register();

$calc = new RpnCalculator\Calculator;

echo "\nВводите числа и операторы в обратной польской нотации по одному\n";
echo "\nСписок доступных операторов:\n";

foreach ($calc->getOperatorCollection()->getOperators() as $operator) {
    printf("  %s %s\n", str_pad($operator->getToken(), 16, ' '), $operator->getDescription());
}

echo "\nДля выхода введите 'exit'\n";

$fp = fopen('php://stdin', 'r');

while (true) {
    echo "\n>";
    $token = fgets($fp);

    if (trim($token) == 'exit') {
        echo "Пока!\n";
        break;
    }

    try {
        $calc->putToken($token);
        printf("[%s]\n", $calc->getStackHead());
    } catch (RpnCalculator\Exception $e) {
        printf("%s\n", $e->getMessage());
    }
}