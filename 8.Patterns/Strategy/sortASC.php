<?php

class sortASC implements Strategy {
    public function doSort(array $data, string $column): array
    {
        array_multisort( array_column($data, $column), SORT_ASC, $data);

        return $data;
    }
}