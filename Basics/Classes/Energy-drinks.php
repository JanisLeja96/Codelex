<?php


$surveyed = 12467;
$purchased_energy_drinks = 0.14;
$prefer_citrus_drinks = 0.64;

function calculate_energy_drinkers(int $numberSurveyed)
{
    return (int) ($numberSurveyed * 0.14);
}

function calculate_prefer_citrus(int $numberSurveyed)
{
    return (int) ($numberSurveyed * 0.64);
}


echo "Total number of people surveyed " . $surveyed;
echo "\nApproximately " . calculate_energy_drinkers($surveyed) . " bought at least one energy drink\n";
echo calculate_prefer_citrus($surveyed) . " of those " . "prefer citrus flavored energy drinks.";
