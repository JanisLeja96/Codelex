<?php

function sum($lowerBound, $upperBound) {
    $sum = 0;
    $avg = ($lowerBound + $upperBound) / 2;
    for ($i = $lowerBound; $i <= $upperBound; $i++) {
        $sum += $i;
    }

    echo "The sum of {$lowerBound} and {$upperBound} is {$sum}\n";
    echo "The average is {$avg}";
}

$lowerBound = 1;
$upperBound = 100;

sum($lowerBound, $upperBound);