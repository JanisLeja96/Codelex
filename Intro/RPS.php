<?php

/*$moves = ['rock', 'paper', 'scissors'];
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
*/

// 0 - Rock
// 1 - Paper
// 2- Scissors

$combinations = [
    0 => 2,
    1 => 0,
    2 => 1
];
$humanMove = (int) readline('Enter your move (0 - rock, 1 - paper, 2 - scissors) : ');
$cpuMove = random_int(0, 2);


if ($humanMove == $cpuMove) {
    echo "It's a tie";
}
if ($combinations[$humanMove] == $cpuMove) {
    echo "You win. CPU chose {$cpuMove}";
} else {
    echo "You lose. CPU chose {$cpuMove}";
}

