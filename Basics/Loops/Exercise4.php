<?php

$input = (int) readline('Max value: ');

for ($i = 1; $i <= $input; $i++) {
    if ($i % 5 == 0 && $i % 3 == 0) {
        echo 'FizzBuzz ';
    } else if ($i % 3 == 0) {
        echo 'Fizz ';
    } else if ($i % 5 == 0) {
        echo 'Buzz ';
    } else {
        echo "{$i} ";
    }

    if ($i % 20 == 0) {
        echo "\n";
    }
}