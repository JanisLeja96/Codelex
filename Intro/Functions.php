<?php

// Exercise 1
function addCodelex($string) {
    return $string . 'codelex';
}
echo addCodelex('Janis');

// Exercise 2
echo "<br>";
function multiply(int $base, int $multiplier) {
    return $base * $multiplier;
}
echo multiply(2, 6);

// Exercise 3
echo "<br>";
/*$person = new stdClass();
$person->name = 'John';
$person->surname = 'Doe';
$person->age = 23;
$person->isAtLeast18 = function() {
    return $this->age >= 18 ? 'Is at least 18' : 'Is not at least 18';
};

echo ($person->isAtLeast18);*/

class Person {
    public $name;
    public $age;
    public $surname;

    public function isAtLeast18()
    {
        return $this->age >= 18 ? 'Is at least 18' : 'Is younger than 18';
    }

    public function __construct($name, $surname, $age) {
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
    }
}
$person = new Person('John', 'Doe', 19);
$person2 = new Person('Jane', 'Doe', 13);

echo $person->isAtLeast18();

// Exercise 4
echo "<br>";
$persons = [
    new Person('Janis', 'Leja', 24),
    new Person('Jane', 'Doe', 16),
    new Person('John', 'Doe', 13)
];

foreach ($persons as $person) {
    echo "$person->name $person->surname" . ' ' .$person->isAtLeast18();
    echo "<br>";
}


// Exercise 5
echo "<br>";
$fruits = [
    'apples' => ['weight' => 13],
    'pears' => ['weight' => 8],
    'oranges' => ['weight' => 5],
    'watermelons' => ['weight' => 25],
    'bananas' => ['weight' => 11]
];

function isOver10KG($fruitWeight) {
    return $fruitWeight > 10;
}

$prices = [
    'Over 10KG' => 2,
    'Less than 10KG' => 1
];

$fruitKeys = array_keys($fruits);
foreach ($fruitKeys as $key) {
    echo isOver10KG($fruits[$key]['weight']) ?
        "{$key} will cost {$prices['Over 10KG']} euros to ship" :
        "{$key} will cost {$prices['Less than 10KG']} euro to ship";
    echo "<br>";
}

// Exercise 6
echo "<br>";
$elements = [1, 2, 3, 4.5, 'five'];

function double($number) {
    return $number * 2;
}

for ($i = 0; $i < count($elements); $i++) {
    if (gettype($elements[$i]) != 'string') {
        echo double($elements[$i]);
        echo "<br>";
    }
}


