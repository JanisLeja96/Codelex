<?php

Class Dog {
    public string $name;
    public string $sex;
    public Dog $mother;
    public Dog $father;

    public function __construct($name, $sex)
    {
        $this->name = $name;
        $this->sex = $sex;
    }

    public function fathersName()
    {
        if (isset($this->father)) {
            return $this->father->name;
        }
        else return "Unknown";
    }

    public function hasSameMotherAs(Dog $otherDog)
    {
        return $this->mother === $otherDog->mother;
    }
}

$max = new Dog('Max', 'male');
$rocky = new Dog('Rocky', 'male');
$sparky = new Dog('Sparky', 'male');
$buster = new Dog('Buster', 'male');
$sam = new Dog('Sam', 'male');
$lady = new Dog('Lady', 'female');
$molly = new Dog('Molly', 'female');
$coco = new Dog('Coco', 'female');

$max->mother = $lady;
$max->father = $rocky;

$coco->mother = $molly;
$coco->father = $buster;

$rocky->mother = $molly;
$rocky->father = $sam;

$buster->mother = $lady;
$buster->father = $sparky;

echo $coco->fathersName() . "\n";
echo $sparky->fathersName(). "\n";

echo $coco->hasSameMotherAs($rocky);