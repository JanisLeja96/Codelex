<?php

function totalPay($basePay, $hoursWorked) {
    if ($hoursWorked > 60) {
        throw new Error("Maximum hours exceeded");
    } else if ($basePay < 8.00) {
        throw new Error("Wage is below minimum");
    }

    $overtime = $hoursWorked - 40;
    if ($overtime > 0) {
        $salary = ($hoursWorked - $overtime) * $basePay;
        $salary = $salary + ($overtime * ($basePay * 1.5));
    } else {
        $salary = $basePay * $hoursWorked;
    }

    return $salary;
}

$employee1 = new stdClass();
$employee1->basePay = 7.50;
$employee1->hoursWorked = 35;

$employee2 = new stdClass();
$employee2->basePay = 8.20;
$employee2->hoursWorked = 47;

$employee3 = new stdClass();
$employee3->basePay = 10.00;
$employee3->hoursWorked = 73;

function mainMethod(...$employees) {
    foreach($employees as $employee) {
        echo "Employee salary: $" . totalPay($employee->basePay, $employee->hoursWorked) . "\n";
    }
}

mainMethod($employee1, $employee2, $employee3);