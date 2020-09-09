<?php

$array1 = array();

for ($i = 0; $i < 10; $i++) {
    $array1[$i] = random_int(1,100);
}

$array2 = array();

for ($i = 0; $i < 10; $i++) {
    $array2[$i] = $array1[$i];
}

$array1[count($array1) - 1] = -7;

echo 'Array 1: ';
for($i = 0; $i < 10; $i++) {
    echo "{$array1[$i]} ";
}
echo "\nArray 2: ";
for($i = 0; $i < 10; $i++) {
    echo "{$array2[$i]} ";
}