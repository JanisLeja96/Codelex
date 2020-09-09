<?php
//TODO
$words = ['codelex', 'bug', 'github', 'javascript'];
$wordToGuess = 'javascript';//$words[random_int(0, 2)];

$splitWord = str_split($wordToGuess);
$hiddenWord = [];
$guesses = [];
$misses = [];

for ($i = 0; $i < count($splitWord); $i++) {
    $hiddenWord[$i] = "_";
}

$isGameOver = false;
while ($isGameOver == false) {
    echo "\nWord: ";
    foreach ($hiddenWord as $letter) {
        echo "{$letter} ";
    }
    echo "\nMisses: ";
    foreach ($misses as $missed) {
        echo "{$missed} ";
    }
    echo "\n";
    $guess = readline("Guess: ");

    if (in_array($guess, $splitWord)) {
        $guessedIndex = array_search($guess, $splitWord);
        $hiddenWord[$guessedIndex] = $splitWord[$guessedIndex];
    } else {
        $misses[] = $guess;
    }

    if (!in_array('_', $hiddenWord)) {
        $isGameOver = true;
    }

    if ($isGameOver) {
        $choice = readline("Play 'again' or 'quit'? ");
        if ($choice == 'again') {

        }
    }

}