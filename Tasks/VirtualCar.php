<?php

// 7l/100km
// 50l
// 90km/h

$speed = 90;
$fuel = 50;
$distance = 0;
$time = 0;

$consumption = 7 / 100;

while ($fuel >= 0) {
    $fuel = $fuel - $consumption;
    $distance++;

    echo "\nRemaining fuel: {$fuel}";
    echo "\nDistance traveled: {$distance}";
    sleep(1);
}
