<?php

namespace App\Services\Repository;


class CatFakeRepository implements ImagesRepositoryInterface {

    /**
     * @var array
     */
    protected $params = [
        'limit' => 8,
        'page' => 1,
        'order' => 'ASC',
    ];

    /**
     * @param $data
     * @return mixed
     */
    private function send($data) {
        return $data;
    }

    /**
     * @return mixed
     */
    public function getCategories() {
        $data = [
            [
                "id" => 5,
                "name" => "boxes"
            ],
            [
                "id" => 15,
                "name" => "clothes"
            ],
            [
                "id" => 1,
                "name" => "hats"
            ],
            [
                "id" => 14,
                "name" => "sinks"
            ],
            [
                "id" => 2,
                "name" => "space"
            ],
            [
                "id" => 4,
                "name" => "sunglasses"
            ],
            [
                "id" => 7,
                "name" => "ties"
            ]
        ];
        return $this->send($data);
    }

    /**
     * @param string $id
     * @return mixed
     */
    public function getById(string $id) {

        $data = [
            [
                "breeds" => [
                ],
                "categories" => [
                    [
                        "id" => 6,
                        "name" => "caturday"
                    ]
                ],
                "id" => "40t",
                "url" => "https://cdn2.thecatapi.com/images/40t.jpg",
                "width" => 550,
                "height" => 733
            ],
        ];

        return $this->send($data);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function getByParameters($params = []) {
        $data = [
            [
                "breeds" => [
                ],
                "categories" => [
                    [
                        "id" => 6,
                        "name" => "caturday"
                    ]
                ],
                "id" => "40t",
                "url" => "https://cdn2.thecatapi.com/images/40t.jpg",
                "width" => 550,
                "height" => 733
            ],
            [
                "breeds" => [
                ],
                "id" => "5nr",
                "url" => "https://cdn2.thecatapi.com/images/5nr.jpg",
                "width" => 640,
                "height" => 640
            ],
            [
                "breeds" => [
                ],
                "id" => "a5b",
                "url" => "https://cdn2.thecatapi.com/images/a5b.jpg",
                "width" => 625,
                "height" => 873
            ],
            [
                "breeds" => [
                ],
                "id" => "brt",
                "url" => "https://cdn2.thecatapi.com/images/brt.jpg",
                "width" => 800,
                "height" => 531
            ],
            [
                "breeds" => [
                ],
                "id" => "cig",
                "url" => "https://cdn2.thecatapi.com/images/cig.jpg",
                "width" => 640,
                "height" => 432
            ],
            [
                "breeds" => [
                ],
                "id" => "dcs",
                "url" => "https://cdn2.thecatapi.com/images/dcs.jpg",
                "width" => 900,
                "height" => 600
            ],
            [
                "breeds" => [
                ],
                "id" => "dum",
                "url" => "https://cdn2.thecatapi.com/images/dum.jpg",
                "width" => 738,
                "height" => 539
            ],
            [
                "breeds" => [
                ],
                "id" => "e5l",
                "url" => "https://cdn2.thecatapi.com/images/e5l.jpg",
                "width" => 799,
                "height" => 1065
            ],
            [
                "breeds" => [
                ],
                "id" => "MTcwNjExMw",
                "url" => "https://cdn2.thecatapi.com/images/MTcwNjExMw.jpg",
                "width" => 625,
                "height" => 450
            ],
            [
                "breeds" => [
                ],
                "id" => "Z0X0gqbd2",
                "url" => "https://cdn2.thecatapi.com/images/Z0X0gqbd2.jpg",
                "width" => 733,
                "height" => 455
            ]
        ];

        return $this->send($data);
    }

    /**
     * @param int $limit
     * @return $this
     */
    public function limit(int $limit) {
        $this->params['limit'] = $limit;
        return $this;
    }

    /**
     * @param int $page
     * @return $this
     */
    public function page(int $page) {
        $this->params['page'] = $page;
        return $this;
    }

    /**
     * @return $this
     */
    public function goToNextPage() {
        $this->params['page']++;
        return $this;
    }

    /**
     * @return int|mixed
     */
    public function getNextPageNumber() {
        return $this->params['page'] + 1;
    }

    /**
     * @return $this
     */
    public function goToPrevPage() {
        if ($this->params['page'] > 1) {
            $this->params['page']--;
        }
        return $this;
    }

    /**
     * @param $value
     * @return $this
     */
    public function orderBy($value) {
        return $this;
    }

    /**
     * @return array
     */
    public function getParams() {
        return $this->params;
    }
}