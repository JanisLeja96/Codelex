<?php

class FuelGauge
{
    private int $currentFuel = 0;
    private int $fuelCapacity = 70;

    public function getCurrentFuel()
    {
        return $this->currentFuel;
    }

    public function addFuel()
    {
        $this->currentFuel++;
    }

    public function decreaseFuel()
    {
        if ($this->currentFuel > 0) {
            $this->currentFuel--;
        }
    }
}

class Odometer
{
    private int $mileage = 0;
    private int $maxMileage = 999999;
    private FuelGauge $fuelGauge;

    public function __construct()
    {
        $this->fuelGauge = new FuelGauge();
    }

    public function getFuelGauge()
    {
        return $this->fuelGauge;
    }

    public function addKM()
    {
        if ($this->fuelGauge->getCurrentFuel()) {
            $this->mileage++;
        }
        if ($this->mileage > $this->maxMileage) {
            $this->mileage = 0;
        }

        if ($this->mileage % 10 == 0) {
            $this->fuelGauge->decreaseFuel();
        }
    }

    public function getMileage()
    {
        return $this->mileage;
    }
}

$odometer = new Odometer();

while ($odometer->getFuelGauge()->getCurrentFuel() < 10) {
    $odometer->getFuelGauge()->addFuel();
}

while ($odometer->getFuelGauge()->getCurrentFuel() > 0) {
    $odometer->addKM();
    echo "Current amount of fuel is {$odometer->getFuelGauge()->getCurrentFuel()} liters. Mileage is {$odometer->getMileage()}\n";
}