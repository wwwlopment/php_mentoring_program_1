<?php


function what_list_am_i_on(array $actions): string {
    $letters = [
        'naughty' => ['b', 'f', 'k'],
        'nice' => ['g', 's', 'n'],
    ];

    $nightly = 0;
    $nice = 0;
    foreach ($actions as $sentence) {
       $nightly += in_array($sentence[0], $letters['naughty']) ? 1 : 0;
       $nice += in_array($sentence[0], $letters['nice']) ? 1 : 0;
    }

    return ($nightly === $nice || $nightly > $nice) ? 'naughty' : 'nice';
}

$bad_actions = ["broke someone's window", "fought over a toaster", "killed a bug"];
echo what_list_am_i_on($bad_actions) . '<br>'; // => "naughty"
$good_actions = ["got someone a new car", "saved a man from drowning", "never got into a fight"];
echo what_list_am_i_on($good_actions) . '<br>'; // => "nice"
$actions = ["broke a vending machine", "never got into a fight", "tied someone's shoes"];
echo what_list_am_i_on($actions) . '<br>'; // => "naughty"


echo '<br><br><br><a href="index.php">Home</a>';