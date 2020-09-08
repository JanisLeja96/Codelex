<?php

// Exercise 1
function addCodelex($string) {
    return $string . 'codelex';
}
echo addCodelex('Janis');

// Exercise 2
echo "<br>";
function multiply($base, $multiplier) {
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