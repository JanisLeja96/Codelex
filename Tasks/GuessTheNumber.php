<?php

$numberToGuess = random_int(1, 100);
echo "\nI'm thinking of a number. Try to guess it\n";

while (true) {
    $guess = (int) readline('Your guess: ');

    if ($guess == $numberToGuess) {
        echo "Correct!";
        break;
    }
    else if (abs($guess - $numberToGuess) > 50) {
        echo "\nSuper cold\n";
    } else if (abs($guess - $numberToGuess) < 5) {
        echo "\nSuper hot\n";
    } else if (abs($guess - $numberToGuess) < 15) {
        echo "\nHot\n";
    } else if (abs($guess - $numberToGuess) < 50) {
        echo "\nCold\n";
    }

}