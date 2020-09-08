<?php

// Exercise 1
$int = 10;
$string = '10';
echo $int == $string ? 'Equal' : 'Not equal';

// Exercise 2
echo "<br>";
$int = 50;
echo $int >= 1 && $int <= 100;

// Exercise 3
echo "<br>";
$string = 'hello';

if ($string == 'hello') {
    echo 'world';
}

// Exercise 4
echo "<br>";
$value = 8;
$x = 11;
$y = 7;

if ($value > $x && $value < $y && $value % 2 == 0) {
    echo "All checks passed";
} else {
    echo "One or more checks didn't pass";
}

// Exercise 5
echo "<br>";
$x = 20;
$y = 60;
$value = 50;

if ($value >= $x && $value <= $y) {
    echo "Value is in range $x - $y";
} else {
    echo "Value is not in range $x - $y";
}

// Exercise 6
echo "<br>";
$plateNumber = 'AA-1234';

switch ($plateNumber) {
    case 'AB-1111' :
        echo 'Not my car';
        break;
    case 'AA-1234' :
        echo 'My car';
        break;
}

// Exercise 7
echo "<br>";
$number = 33;

switch ($number) {
    case $number < 50 :
        echo 'Low';
        break;
    case $number > 50 && $number < 100 :
        echo 'Medium';
        break;
    case $number > 100 :
        echo 'High';
        break;
}
