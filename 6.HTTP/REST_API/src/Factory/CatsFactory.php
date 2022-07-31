<?php

namespace App\Factory;

use App\Services\Cache\CacheHandler;
use App\Services\Repository\CatFakeRepository;
use App\Services\Repository\CatApiRepository;
use GuzzleHttp\Client;
use Monolog\Logger;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class CatsFactory {

    /**
     * @param $params
     * @return CatApiRepository|CatFakeRepository
     */
    public static function build($params) {
        if (array_key_exists('online', $params) && $params['online'] === true) {
            $caching = array_key_exists('caching', $params) && $params['caching'] === true
                ? new CacheHandler(new FilesystemAdapter('FilesystemCache', CacheHandler::CACHE_LIFETIME, "../var/cache/cats/"))
                : null ;

            $logging = array_key_exists('logging', $params) && $params['logging'] === true
                ? new Logger('cats_api')
                : null ;
            return new CatApiRepository(new Client(), $logging, $caching);
        }

        return new CatFakeRepository();
    }
}