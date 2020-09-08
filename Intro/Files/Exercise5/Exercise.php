<?php

function readFromCSV($id) {
    $file = fopen("persons.csv", 'r');
    $found = false;

    while(! feof($file)) {
        $output = fgetcsv($file);

        if ($output[0] == $id) {
            $found = true;
            foreach ($output as $cell) {
                echo $cell . ' ';
            }
        } else if (feof($file) && ! $found) {
            echo 'User not found';
        }
    }
}

readFromCSV($argv[1]);
