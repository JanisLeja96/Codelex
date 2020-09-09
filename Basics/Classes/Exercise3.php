<?php

Class FuelGauge {
    public int $currentFuel = 0;
    public int $fuelCapacity = 70;

    public function getCurrentFuel() {
        return $this->currentFuel;
    }

    public function addFuel() {
        $this->currentFuel++;
    }

    public function decreaseFuel() {
        if ($this->currentFuel > 0) {
            $this->currentFuel--;
        }
    }
}

class Odometer {
    public int $mileage = 0;
    public int $maxMileage = 999999;
    public FuelGauge $fuelGauge;

    public function __construct($fuelGauge) {
        $this->fuelGauge = $fuelGauge;
    }

    public function addKM() {
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
}

$fuelGauge = new FuelGauge();
$odometer= new Odometer($fuelGauge);

while ($fuelGauge->currentFuel < 10) {
    $fuelGauge->addFuel();
}

while ($fuelGauge->getCurrentFuel() > 0) {
    $odometer->addKM();
    echo "Current amount of fuel is {$fuelGauge->getCurrentFuel()} liters. Mileage is {$odometer->mileage}\n";
}