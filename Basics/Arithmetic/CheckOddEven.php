<?php

function checkOddEven(int $number) {
    echo $number % 2 == 0 ? 'Even number' : 'Odd number';
}
checkOddEven($argv[1]);
echo "\nbye!";
