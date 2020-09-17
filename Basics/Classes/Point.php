<?php

Class Point {
    private $x;
    private $y;

    public function __construct($x, $y) {
        $this->x = $x;
        $this->y = $y;
    }

    public static function swap_points(Point $p1, Point $p2) {
        $tempX = $p1->x;
        $tempY = $p1->y;

        $p1->x = $p2->x;
        $p1->y = $p2->y;

        $p2->x = $tempX;
        $p2->y = $tempY;
    }

    public function getX()
    {
        return $this->x;
    }

    public function getY()
    {
        return $this->y;
    }
}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);

Point::swap_points($p1, $p2);
echo "(" . $p1->getX() . ", " . $p1->getY() . ")";
echo "(" . $p2->getX() . ", " . $p2->getY() . ")";
