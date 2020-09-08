<?php
// Exercise 1
$values = [1, 2, 3];
echo array_sum($values);

// Exercise 2
echo "<br>";
$person = [
    "name" => "John",
    "surname" => "Doe",
    "age" => 50
];
var_dump($person);

// Exercise 3
echo "<br>";

$person = new stdClass();
$person->name = "John";
$person->surname = "Doe";
$person->surname = 50;

var_dump($person);

// Exercise 4
echo "<br>";
$items = [
    [
        [
            "name" => "John",
            "surname" => "Doe",
            "age" => 50
        ],
        [
            "name" => "Jane",
            "surname" => "Doe",
            "age" => 41
        ]
    ]
];
$name = $items[0][1]['name'];
$surname = $items[0][1]['surname'];
$age = $items[0][1]['age'];
echo "$name $surname $age";

// Exercise 5
echo "<br>";
$items = [
    [
        [
            "name" => "John",
            "surname" => "Doe",
            "age" => 50
        ],
        [
            "name" => "Jane",
            "surname" => "Doe",
            "age" => 41
        ]
    ]
];

$jane = $items[0][0]['name'];
$john = $items[0][1]['name'];
$surname = $items[0][1]['surname'];

echo "$john & $jane $surname's";

