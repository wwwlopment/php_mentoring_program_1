<?php

interface Strategy {
    public function doSort(array $data, string $column): array;
}