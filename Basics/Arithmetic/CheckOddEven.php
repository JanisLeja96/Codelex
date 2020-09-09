<?php

function checkOddEven(int $number) {
    echo $number % 2 == 0 ? 'Even number' : 'Odd number';
}
checkOddEven(readline('Enter a number:'));
echo "\nbye!";
