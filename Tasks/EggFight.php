<?php

$humanLives = (int) readline("Enter amount of eggs for human: ");
$cpuLives = (int) readline("Enter amount of eggs for CPU: ");
$humanWins = 0;
$cpuWins = 0;

function getWinner() {
    global $cpuLives;
    if ($cpuLives == 0) {
        return "\nYou win.";
    } else {
        return "\nCPU wins";
    }
}

while ($humanLives > 0 && $cpuLives > 0) {
    $humanEgg = (int) rand(1, 100);
    $cpuEgg = (int) rand(1, 100);

    if ($humanEgg > $cpuEgg) {
        echo "You win\n";
        $cpuLives--;
        $humanWins++;
    } else if ($humanEgg < $cpuEgg) {
        echo "You lose\n";
        $humanLives--;
        $cpuWins++;
    } else {
        echo "Tie. Both lose an egg";
        $humanLives--;
        $cpuLives--;
    }
    echo "You have {$humanLives} eggs left.\n";
    echo "CPU has {$cpuLives} eggs left.\n";
}

echo getWinner();
echo "\nYou won {$humanWins} times";
echo "\nCPU won {$cpuWins} times";
