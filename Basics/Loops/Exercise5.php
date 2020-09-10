<?php

echo "Welcome to Piglet!\n";

$gameOver = false;
$points = 0;

while ($gameOver == false) {
    $roll = random_int(1, 6);
    $points += $roll;
    echo "You rolled a {$roll}\n";

    if ($roll == 1) {
        $points = 0;
        $gameOver = true;
        break;
    }

    $choice = readline('Roll again (y/n)? ');
    if ($choice == 'n') {
        $gameOver = true;
    }
}
if ($gameOver) {
    echo "You got {$points} points.";
}