<?php

namespace App\Services\Repository;

interface ImagesRepositoryInterface {
    public function getCategories();
    public function getById(string $id);
    public function getByParameters($params);
    public function getParams();
    public function limit(int $limit);
    public function page(int $page);
    public function goToNextPage();
    public function getNextPageNumber();
    public function goToPrevPage();
    public function orderBy($value);
}