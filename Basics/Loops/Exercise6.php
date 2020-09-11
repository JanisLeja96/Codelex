<?php

Class AsciiFigure
{
    public const SIZE = 5;

    public static function draw() {
        $lineLength = 8 * (AsciiFigure::SIZE - 1);
        echo "\n\n";
        for ($i = 0; $i < AsciiFigure::SIZE; $i++) {
            $starCount = 8 * $i;

            for ($j = 0; $j < $lineLength; $j++) {
                if ($j < ($lineLength - $starCount) / 2) {
                    echo "/";
                } else if ($starCount > 0 && $lineLength - $j > $j - ($starCount)) {
                    echo "*";
                } else if ($starCount == $lineLength) {
                    echo "*";
                } else if ($lineLength - $j <= $j - ($starCount)) {
                    echo "\\";
                }
            }
            echo "\n";
        }
        echo "\n\n";
    }
}

AsciiFigure::draw();