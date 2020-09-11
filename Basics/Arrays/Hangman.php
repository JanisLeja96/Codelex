<?php

function getStatus($hiddenWord, $misses) {
    $attempts = 6 - count($misses);
    echo "\nWord: ";
    foreach ($hiddenWord as $letter) {
        echo "{$letter} ";
    }
    echo "\nMisses: ";
    foreach ($misses as $missed) {
        echo "{$missed} ";
    }
    echo "\nYou have {$attempts} attempts left";
    echo "\n";
}

$isGameOver = false;
game :
    $words = ['codelex', 'bug', 'github', 'javascript'];
    $wordToGuess = $words[random_int(0, 3)];

    $splitWord = str_split($wordToGuess);
    $hiddenWord = [];
    $guesses = [];
    $misses = [];
    $attempts = 6;

    for ($i = 0; $i < count($splitWord); $i++) {
        $hiddenWord[$i] = "_";
    }
    while ($isGameOver == false) {
    getStatus($hiddenWord, $misses);
    $guess = readline("Guess: ");

    if (in_array($guess, $splitWord)) {
        $guessedIndex = array_search($guess, $splitWord);
        $hiddenWord[$guessedIndex] = $splitWord[$guessedIndex];
        $splitWord[$guessedIndex] = '';
    } else {
        $misses[] = $guess;
        $attempts--;
    }

    if (!in_array('_', $hiddenWord)) {
        $isGameOver = true;
    }

    if ($attempts == 0) {
        $hiddenWord = $splitWord;
        $isGameOver = true;
    }

    if ($isGameOver) {
        getStatus($hiddenWord, $misses);
        $choice = readline("Play 'again' or 'quit'? ");
        if ($choice == 'again') {
            $isGameOver = false;
            goto game;
        }
    }

}