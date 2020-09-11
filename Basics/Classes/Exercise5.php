<?php

class Date
{
    private int $month;
    private int $day;
    private int $year;

    public function __construct($day, $month, $year)
    {
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
    }

    public function displayDate() {
        return "{$this->day}/{$this->month}/{$this->year}";
    }

    public function setDay(int $day)
    {
        $this->day = $day;
    }

    public function getDay()
    {
        return $this->day;
    }

    public function setMonth(int $month)
    {
        $this->month = $month;
    }

    public function getMonth() {
        return $this->month;
    }

    public function setYear(int $year)
    {
        $this->year = $year;
    }

    public function getYear()
    {
        return $this->year;
    }
}

$date = new Date(6, 9, 1996);
echo ($date->displayDate());
$date->setDay(25);
echo "\n" . ($date->displayDate());