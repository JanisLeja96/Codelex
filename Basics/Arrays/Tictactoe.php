<?php
error_reporting(1);
$turn = 'X';
$cells = [[' ', ' ', ' '],
          [' ', ' ', ' '],
          [' ', ' ', ' ']
];

$winningCombinations = [
    [
        [0, 0], [0, 1], [0, 2]
    ],
    [
        [0, 0], [1, 1], [2, 2]
    ],
    [
        [0, 0], [0, 1], [0, 2]
    ],
    [
        [0, 1], [1, 1], [2, 1]
    ],
    [
        [0, 2], [2, 1], [2, 2]
    ],
    [
        [1, 0], [1, 1], [1, 2]
    ],
    [
        [2, 0], [2, 1], [2, 2]
    ],
    [
        [0, 2], [1, 1], [2, 0]
    ]
];
$playerLocations = [
    'X' => [],
    'O' => []
];

function display_board() {
    global $cells;

    echo " {$cells[0][0]} | {$cells[0][1]} |  {$cells[0][2]}\n";
    echo "---+---+---\n";
    echo " {$cells[1][0]} | {$cells[1][1]} |  {$cells[1][2]}\n";
    echo "---+---+---\n";
    echo " {$cells[2][0]} | {$cells[2][1]} |  {$cells[2][2]}\n";
}

function makeTurn($row, $column) {
    global $cells;
    global $turn;
    global $playerLocations;

    $cells[$row][$column] = $turn;
    array_push($playerLocations[$turn], [$row, $column]);

    if ($turn == 'X') {
        $turn = 'O';
    } else {
        $turn = 'X';
    }
}

function getWinner() {
    global $playerLocations;
    global $winningCombinations;

    foreach ($winningCombinations as $combo) {
        if (in_array($combo[0], $playerLocations['X']) &&
            in_array($combo[1], $playerLocations['X']) &&
            in_array($combo[2], $playerLocations['X'])) {
                $winner = 'X';
        } else if (in_array($combo[0], $playerLocations['O']) &&
                    in_array($combo[1], $playerLocations['O']) &&
                    in_array($combo[2], $playerLocations['O'])) {
                $winner = 'O';
        }
    }
    if ($winner) {
        return $winner;
    }
}

function isBoardFull() {
    global $cells;

    if (!in_array(' ', $cells[0]) &&
        !in_array(' ', $cells[1]) &&
        !in_array(' ', $cells[2])) {
        return true;
    }
    return false;
}

$winnerExists = false;
while ($winnerExists == false && !isBoardFull()) {
    $location = readline("{$turn}: Enter a location (row, column) separated with space: ");

    if ($cells[$location[0]][$location[2]] == ' ') {
        maketurn($location[0], $location[2]);
    }
    display_board();
    if (getWinner()) {
        $winnerExists = true;
        echo "Winner is " . getWinner();
    } else if (isBoardFull()) {
        echo "It's a tie";
    }
}