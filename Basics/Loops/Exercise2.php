<?php


echo "Input number of terms: ";
$input = readline();
$space = strpos($input, ' ');
$number = (int) substr($input, 0, $space);
$power = (int) substr($input, $space);

function raiseToPower(int $number, int $power) : int {
    $currentNumber = $number;
    for ($i = 1; $i < $power; $i++) {
        $currentNumber = $number * $currentNumber;
    }
    return $currentNumber;
}

echo raiseToPower($number, $power);