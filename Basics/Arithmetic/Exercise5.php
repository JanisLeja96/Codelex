<?php

$correctNumber = random_int(1, 100);
echo "I'm thinking of a number between 1-100. Try to guess it.\n";
$userAnswer = readline();

if ($userAnswer < $correctNumber) {
    echo "Sorry, you are too low. I was thinking of {$correctNumber}";
} else if ($userAnswer > $correctNumber) {
    echo "Sorry, you are too high. I was thinking of {$correctNumber}";
} else {
    echo "You guessed it! What are the odds?!";
}