<?php

$firstWord = readline('Enter first word: ');
$secondWord = readline('Enter second word: ');

echo $firstWord;
$lineLength = strlen($firstWord);

while ($lineLength < 30 - strlen($secondWord)) {
    echo '.';
    $lineLength++;
}
echo $secondWord;
