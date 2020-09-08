<?php

class Person {
    public $name;
    public $surname;
    public $age;

    public function __construct($name, $surname, $age) {
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
    }
}


function objectFromFile($fileName) {
    $file = fopen($fileName, 'r');
    $contents = fread($file, filesize($fileName));

    $data = explode(',', $contents);
    fclose($file);
    return new Person($data[0], $data[1], $data[2]);
}

$person = objectFromFile($argv[1]);
echo "{$person->name} {$person->surname} {$person->age}";

