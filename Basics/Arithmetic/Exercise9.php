<?php

function calculateBMI($weight, $height) {
    $BMI = $weight / (pow($height, 2));
    echo "Your BMI is {$BMI}\n";

    if ($BMI > 18.5 && $BMI < 25) {
        echo 'You have optimal weight!';
    } else if ($BMI <= 18.5) {
        echo 'You are underweight';
    } else if ($BMI >= 25) {
        echo 'You are overweight';
    }
}

calculateBMI(readline('Enter your weight:'), readline('Enter your height: '));