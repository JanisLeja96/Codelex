<?php

$moves = ['rock', 'paper', 'scissors'];
$cpuMove = $moves[random_int(0, 2)];
$humanMove = readline('Enter your move: ');

if ($humanMove == 'rock' && $cpuMove == 'paper') {
    echo "You win. CPU chose {$cpuMove}\n";
} else if ($humanMove == 'paper' && $cpuMove == 'rock') {
    echo "You win. CPU chose {$cpuMove}\n";
} else if ($humanMove == 'scissors' && $cpuMove == 'paper') {
    echo "You win. CPU chose {$cpuMove}\n";
} else if ($humanMove == $cpuMove) {
    echo "Tie\n";
} else {
    echo "You lose. CPU chose {$cpuMove}\n";
}