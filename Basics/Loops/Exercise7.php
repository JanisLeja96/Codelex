<?php

class RollTwoDice
{
    public int $firstDie;
    public int $secondDie;
    public int $sum;

    public function __construct()
    {
        $this->roll();
    }

    public function roll()
    {
        $this->firstDie = random_int(1, 6);
        $this->secondDie = random_int(1, 6);
        $this->sum = $this->firstDie + $this->secondDie;
    }

    public function play()
    {
        $desiredSum = readline('Desired sum: ');

        while ($desiredSum != $this->sum) {
            $this->roll();
            echo "{$this->firstDie} and {$this->secondDie} = {$this->sum}\n";
        }
    }
}

$game = new RollTwoDice();
$game->play();