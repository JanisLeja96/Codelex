<?php
// Exercise 1
$ints = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
foreach ($ints as $int) {
    echo $int;
}

// Exercise 2
echo "<br>";
$ints = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
for ($i = 0; $i < 10; $i++) {
    echo $ints[$i];
}

// Exercise 3
echo "<br>";
$x = 1;
while ($x < 10) {
    echo 'Codelex';
    $x++;
}

// Exercise 4
echo "<br>";
$ints = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
foreach ($ints as $int) {
    if ($int % 3 == 0) {
        echo $int;
    }
}

// Exercise 5
echo "<br>";
$persons = [
    'Person1' => [
        'name' => 'Janis',
        'surname' => 'Leja',
        'age' => 24,
        'birthday' => '6th of September'
    ],
    'Person2' => [
        'name' => 'John',
        'surname' => 'Doe',
        'age' => 30,
        'birthday' => '1st of January'
    ],
    'Person 3' => [
        'name' => 'Jane',
        'surname' => 'Doe',
        'age' => 29,
        'birthday' => '2nd of February'
    ]
];

foreach ($persons as $person) {
    foreach ($person as $data) {
        echo $data . " ";
    }
    echo "<br>";
}