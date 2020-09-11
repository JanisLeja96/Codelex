<?php

class Geometry {

    public static function circleArea() {
        $radius = readline('Enter radius: ');
        if ($radius < 0) {
            throw new Error('Negative values cannot be used');
        }
        return "Area is " . pi() * $radius * 2;
    }

    public static function rectangleArea() {
        $length = readline('Enter length: ');
        if ($length < 0) {
            throw new Error('Length cannot be negative');
        }
        $width = readline('Enter width: ');
        if ($width < 0) {
            throw new Error("Width cannot be negative");
        }
        return "Area is " . $length * $width;
    }

    public static function triangleArea() {
        $base = readline("Enter base: ");
        if ($base < 0) {
            throw new Error('Base cannot be negative');
        }
        $height = readline('Enter height');
        if ($height < 0) {
            throw new Error('Height cannot be negative');
        }
        return "Area is " . $base * $height * 0.5;
    }
}

while (true) {

    echo "\n\nGeometry Calculator\n";
    echo "1. Calculate the Area of a Circle\n";
    echo "2. Calculate the Area of a Rectangle\n";
    echo "3. Calculate the Area of a Triangle\n";
    echo "4. Quit\n";
    echo "Enter your choice (1-4) : \n";

    $choice = readline();

    if ($choice < 1 || $choice > 4) {
        throw new Error('Invalid number entered');
    }
    switch ($choice) {
        case 1:
            echo Geometry::circleArea();
            break;

        case 2:
            echo Geometry::rectangleArea();
            break;

        case 3:
            echo Geometry::triangleArea();
            break;

        case 4:
            exit(0);
    }
}

