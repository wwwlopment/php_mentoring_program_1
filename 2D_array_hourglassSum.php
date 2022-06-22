<?php

/*
 * Complete the 'hourglassSum' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts 2D_INTEGER_ARRAY arr as parameter.
 */

function hourglassSum(array $arr) {
    // Write your code here
    $minSize = count($arr) - 2;

    if ($minSize < 1) {
        die('Impossible, minimal size of array is 3 items');
    }

    $maxSum = 0;
    for ($i = 0; $i < $minSize; $i++) {
        for ($j = 0; $j < $minSize; $j++) {
            $sum = ($arr[$i][$j] + $arr[$i][$j + 1] + $arr[$i][$j + 2]) +
                ($arr[$i + 1][$j + 1]) +
                ($arr[$i + 2][$j] + $arr[$i + 2][$j + 1] + $arr[$i + 2][$j + 2]);
            $maxSum = max($maxSum, $sum);
        }
    }
    
    return $maxSum;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$arr = array();

for ($i = 0; $i < 6; $i++) {
    $arr_temp = rtrim(fgets(STDIN));

    $arr[] = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));
}

$result = hourglassSum($arr);

fwrite($fptr, $result . "\n");

fclose($fptr);
