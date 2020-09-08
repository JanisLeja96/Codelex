<?php
Class Person {
    public $name;
    public $cash;
    public $licenses;

    public function __construct($name, $licenses, $cash) {
        $this->name = $name;
        $this->licenses = $licenses;
        $this->cash = $cash;
    }
}

class Gun {
    public $name;
    public $price;
    public $requiredLicense;

    public function __construct($name, $price, $requiredLicense) {
        $this->name = $name;
        $this->price = $price;
        $this->requiredLicense = $requiredLicense;
    }
}

$guns = [
    new Gun('Desert Eagle', 1400, 'P'),
    new Gun('M4A1', 3100, 'AR'),
    new Gun('AK-47', 2500, 'AR'),
    new Gun('M9', 600, 'P'),
    new Gun('AK-74u', 2200, 'SMG'),
    new Gun('Uzi', 2600, 'SMG')
];

$john = new Person('John', ['AR', 'P'], 4000);

$affordable = array_filter($guns, function($gun) use ($john) {
   return $gun->price <= $john->cash;
});

$canBuy = false;
foreach ($affordable as $gun) {
    if (in_array($gun->requiredLicense, $john->licenses)) {
        $canBuy = true;
        break;
    }
}

echo $canBuy == true ? 'John can buy a gun' : "John can't buy a gun";

