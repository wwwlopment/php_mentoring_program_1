<?php

namespace App\Services\Cache;

use Symfony\Component\Cache\PruneableInterface;

class CacheHandler {

    const CACHE_LIFETIME = 180;

    /**
     * @var PruneableInterface
     */
    public $cachePool;

    /**
     * @param PruneableInterface $cachePool
     */
    public function __construct(PruneableInterface $cachePool) {
        $this->cachePool = $cachePool;
    }

    /**
     * @param $params
     * @return string
     */
    public function getKey($params) {
        return md5(json_encode($params));
    }

    /**
     * @return int
     */
    public function getLifetime() {
        return self::CACHE_LIFETIME;
    }

}