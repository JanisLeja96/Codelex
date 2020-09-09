<?php

function fifteen(int $first, int $second) {
    if ($first == 15 || $second == 15) {
        return true;
    } else if ($first + $second == 15 || abs($first - $second) == 15) {
        return true;
    }
    return false;
}

echo fifteen($argv[1], $argv[2]);