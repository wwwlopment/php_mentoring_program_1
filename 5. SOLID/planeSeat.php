<?php

function checkPlace($places, $needle) {
    foreach ($places as $key => $range){
        if (in_array($needle, $range)){
            return $key;
        }
    }
    return null;
}

function planeSeat($a) {
    define("NO_SEAT", 'No Seat!!');
    preg_match("/(\d+)([A-H,K]+)/", $a, $matches);//[]
    if (empty($matches[1]) || empty($matches[2])) {
        return NO_SEAT;
    }

    $numbers = [
        'Front' => range(1,20),
        'Middle' => range(21, 40),
        'Back' => range(41, 60),
    ];
    $letters = [
        'Left' => ['A', 'B', 'C'],
        'Middle' => ['D', 'E', 'F'],
        'Right' => ['G', 'H', 'K'],
    ];

    $number = checkPlace($numbers, $matches[1]);
    $letter = checkPlace($letters, $matches[2]);

    if (empty($number) || empty($letter)) {
        return NO_SEAT;
    }
    return $number . '-' . $letter;
}

echo planeSeat("2A") . '<br>';
echo planeSeat("23D") . '<br>';
echo planeSeat("49K") . '<br>';
echo planeSeat("60A") . '<br>';
echo planeSeat("61D") . '<br>';
echo planeSeat("30I") . '<br>';

echo '<br><br><br><a href="index.php">Home</a>';