<?php

$cpuGuessCount = (int) readline('Enter CPU guess count: ');
$numberToGuess = random_int(1, 100);
$cpuGuess = random_int(1, 100);
$max = 100;
$min = 0;

while ($cpuGuessCount > 0) {

    echo "\nThe guess: {$cpuGuess}";

    if ($cpuGuess == $numberToGuess) {
        echo "\nGuessed\n";
        break;
    } else if ($cpuGuess > $numberToGuess) {
        echo " Too high\n";
        $max = $cpuGuess;
        $cpuGuess = random_int($min, $max);
        $cpuGuessCount--;
    } else if ($cpuGuess < $numberToGuess) {
        echo " Too low\n";
        $min = $cpuGuess;
        $cpuGuess = random_int($min, $max);
        $cpuGuessCount--;
    }



}

if ($cpuGuessCount == 0) {
    echo "CPU ran out of guesses";
}
echo "The number was {$numberToGuess}";