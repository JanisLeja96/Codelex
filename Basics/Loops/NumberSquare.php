<?php

class NumberSquare {
    public int $min;
    public int $max;

    public function __construct()
    {
        $this->min = readline('Min? ');
        $this->max = readline('Max? ');
    }
    public function print($array) {
        foreach ($array as $number) {
            echo $number;
        }
        echo "\n";
    }

    public function doTask()
    {
        $numbers = [];
        for ($i = $this->min; $i <= $this->max; $i++) {
            $numbers[] = $i;
        }

        while ($numbers[0] != $this->max) {
            $this->print($numbers);
            $first = $numbers[0];
            for ($i = 0; $i < count($numbers) - 1; $i++) {
                $numbers[$i] = $numbers[$i + 1];
            }
            $numbers[count($numbers) - 1] = $first;
        }
        $this->print($numbers);
    }
}

$app = new NumberSquare();
$app->doTask();

