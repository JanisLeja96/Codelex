<?php

$string = readline('Enter string: ');

$strAsArray = str_split(strtoupper($string));

function keypad($letterArray) {
    $numberKeys = [];

    foreach ($letterArray as $letter) {
        switch ($letter) {
            case 'C' :
                $numberKeys[] = 2;
            case 'B' :
                $numberKeys[] = 2;
            case 'A' :
                $numberKeys[] = 2;
                break;
            case 'F' :
                $numberKeys[] = 3;
            case 'E' :
                $numberKeys[] = 3;
            case 'D' :
                $numberKeys[] = 3;
                break;
            case 'I' :
                $numberKeys[] = 4;
            case 'H' :
                $numberKeys[] = 4;
            case 'G' :
                $numberKeys[] = 4;
                break;
            case 'L' :
                $numberKeys[] = 5;
            case 'K' :
                $numberKeys[] = 5;
            case 'J' :
                $numberKeys[] = 5;
                break;
            case 'O' :
                $numberKeys[] = 6;
            case 'N' :
                $numberKeys[] = 6;
            case 'M' :
                $numberKeys[] = 6;
                break;
            case 'S' :
                $numberKeys[] = 7;
            case 'R' :
                $numberKeys[] = 7;
            case 'Q' :
                $numberKeys[] = 7;
            case 'P' :
                $numberKeys[] = 7;
                break;
            case 'V' :
                $numberKeys[] = 8;
            case 'U' :
                $numberKeys[] = 8;
            case 'T' :
                $numberKeys[] = 8;
                break;
            case 'Z' :
                $numberKeys[] = 9;
            case 'Y' :
                $numberKeys[] = 9;
            case 'X' :
                $numberKeys[] = 9;
            case 'W' :
                $numberKeys[] = 9;
                break;
            default:
                break;
        }
    }
    return implode('', $numberKeys);
}

echo keypad($strAsArray);