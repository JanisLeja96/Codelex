<?php

$size = (int) readline('Enter size of figure: ');
$lineLength = 8 * ($size - 1);
echo "\n\n";
for ($i = 0; $i < $size; $i++) {
    $starCount = 8 * $i;

    for ($j = 0; $j < $lineLength; $j++) {
        if ($j < ($lineLength - $starCount) / 2) {
            echo "/";
        } else if ($starCount > 0 && $lineLength - $j >= $j - ($starCount - $i)) {
            echo "*";
        } else if ($starCount == $lineLength) {
            echo "*";
        } else if ($lineLength - $j <= $j - ($starCount - $i)) {
            echo "\\";
        }
    }
    echo "\n";
}
echo "\n\n";
