<?php

/*
 * Complete the 'hourglassSum' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts 2D_INTEGER_ARRAY arr as parameter.
 */

function hourglassSum($arr) {
    // Write your code here
        $maxSum = '';
        $cnt = count($arr);
    for ($step1 = 0; $step1 < $cnt-2; $step1++){
        for ($step2 = 0; $step2 < $cnt-2; $step2++){
            $currentSum = $arr[$step1][$step2] + $arr[$step1][$step2+1] 
         + $arr[$step1][$step2+2] + $arr[$step1+1][$step2+1] 
         + $arr[$step1+2][$step2] + $arr[$step1+2][$step2+1] 
         + $arr[$step1+2][$step2+2];

            if($currentSum <= 0){
               $temp = $currentSum;
               if (is_string($maxSum)){
                   $maxSum = $temp;
               } else if($temp == 0 && $maxSum <= 0){
                   $maxSum = $temp;
               }
                else if($temp > $maxSum){
                   $maxSum = $temp;
               }
            } else if($currentSum > $maxSum){
                $maxSum = $currentSum;
            } 
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
