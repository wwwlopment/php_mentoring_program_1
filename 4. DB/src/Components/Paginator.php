<?php

namespace App\Components;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepositoryInterface;

class Paginator {

    protected $repository;
    protected $limit = 5;

    public $page = 1;
    public $onPageCount;
    public $allItemsCount;
    public $pages;
    public $pagesCount;
    public $pools;
    public $prevPageNumber;
    public $nextPageNumber;


    /**
     * @param $page
     * @return $this
     */
    public function setCurrentPage($page) {
        $this->page = $page;
        return $this;
    }

    /**
     * @param $limit
     * @return $this
     */
    public function setLimit($limit) {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @param ServiceEntityRepositoryInterface $repository
     * @return $this
     */
    public function setRepository(ServiceEntityRepositoryInterface $repository): Paginator {
        $this->repository = $repository;
        return $this;
    }

    /**
     * @return $this
     */
    public function paginate(): Paginator {
        $this->allItemsCount = count($this->repository->findAll());
        $this->pagesCount = ceil($this->allItemsCount / $this->limit);
        $this->pages = range(1, $this->pagesCount);
        $this->pools = $this->repository->findBy([], [], $this->limit, ($this->limit * ($this->page - 1)));
        $this->onPageCount = count($this->pools);
        $this->nextPageNumber = $this->pagesCount > $this->page ? $this->page + 1 : $this->pagesCount;
        $this->prevPageNumber = $this->page > 1 ? $this->page - 1 : 1;

        return $this;
    }

}