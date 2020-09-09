<?php

echo "Input the 1st number: ";
$first = readline();
echo "\nInput the 2nd number: ";
$second = readline();
echo "\nInput the 3rd number: ";
$third = readline();

$numbers = [$first, $second, $third];
sort($numbers);
echo "\n{$numbers[2]}\n";
