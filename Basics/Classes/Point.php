<?php

Class Point {
    public $x;
    public $y;

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
}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);

Point::swap_points($p1, $p2);
echo "(" . $p1->x . ", " . $p1->y . ")";
echo "(" . $p2->x . ", " . $p2->y . ")";
