<?php

Class Dog {
    private string $name;
    private string $sex;
    private Dog $mother;
    private Dog $father;

    public function __construct($name, $sex)
    {
        $this->name = $name;
        $this->sex = $sex;
    }

    public function setFather(Dog $father)
    {
        $this->father = $father;
    }

    public function setMother(Dog $mother)
    {
        $this->mother = $mother;
    }

    public function getMother()
    {
        return $this->mother;
    }

    public function getFather()
    {
        return $this->father;
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

$max->setMother($lady);
$max->setFather($rocky);

$coco->setMother($molly);
$coco->setFather($buster);

$rocky->setMother($molly);
$rocky->setFather($sam);

$buster->setMother($lady);
$buster->setFather($sparky);

echo $coco->fathersName() . "\n";
echo $sparky->fathersName(). "\n";

echo $coco->hasSameMotherAs($rocky);