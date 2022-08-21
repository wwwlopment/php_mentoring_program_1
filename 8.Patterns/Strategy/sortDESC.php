<?php

class sortDESC implements Strategy {
    public function doSort(array $data, string $column): array
    {
        array_multisort( array_column($data, $column), SORT_DESC, $data);

        return $data;
    }
}