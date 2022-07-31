<?php

namespace App\Services\Repository;

use App\Services\Cache\CacheHandler;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Monolog\Logger;
use Symfony\Contracts\Cache\ItemInterface;

/**
 *
 */
class CatApiRepository implements ImagesRepositoryInterface {

    const API_URL = 'https://api.thecatapi.com/v1/';
    const API_HEADERS =  [
        'Accept' => 'application/json',
        'x-api-key' => 'fba2ce1a-e989-4079-9017-7ae3b5455d7c',  //TODO move to .env
    ];
    const ORDER_VARIANTS = [
        'asc' => 'ASC',
        'desc' => 'DESC',
        'rand' => 'RANDOM'
    ];

    /**
     * @var ClientInterface
     */
    protected $client;
    /**
     * @var Logger|null
     */
    protected $logger;
    /**
     * @var CacheHandler|null
     */
    protected $cache;

    protected $result;
    /**
     * @var array
     */
    protected $options = [
        'base_uri' => self::API_URL,
        'headers' => self::API_HEADERS,
        ];
    /**
     * @var array
     */
    protected $params = [
        'limit' => 8,
        'page' => 1,
        'order' => 'ASC',
    ];

    /**
     * @param ClientInterface $client
     * @param Logger|null $logger
     * @param CacheHandler|null $cache
     */
    public function __construct(ClientInterface $client, Logger $logger = null, CacheHandler $cache = null) {
        $this->client = $client;
        $this->logger = $logger;
        $this->cache = $cache;
    }

    /**
     * @param $uri
     * @param $options
     * @param $type
     * @return mixed|string
     */
    protected function get($uri, $options = [], $type = 'GET') {
        $requestOptions = array_merge($options, $this->options);
        if ($this->cache){
            return $this->getCached($uri, $requestOptions, $type);
        }
        return $this->makeRequest($uri, $requestOptions, $type);
    }

    /**
     * @param $uri
     * @param $requestOptions
     * @param $type
     * @return mixed
     */
    public function getCached($uri, $requestOptions, $type) {
        $key = $this->cache->getKey([$uri, $requestOptions, $type]);
        return $this->cache->cachePool->get($key, function (ItemInterface $item) use ($uri, $requestOptions, $type) {
            $item->expiresAfter($this->cache->getLifetime());
            return $this->makeRequest($uri, $requestOptions, $type);
        });
    }

    /**
     * @param $uri
     * @param $requestOptions
     * @param $type
     * @return mixed|string
     */
    protected function makeRequest($uri, $requestOptions, $type) {
        try {
            if ($this->logger) {
                $this->logger->info('Request: ', ['type' => $type, 'uri' => $uri, 'options' => $requestOptions]);
            }

            $response = $this->client->request($type, $uri, $requestOptions);
            $responseContent = $response->getBody()->getContents();
            if ($this->logger) {
                $this->logger->info('Response: ', ['body' => $responseContent]);
            }

            $this->result = json_decode($responseContent, true);
            return $this->result;
        } catch (GuzzleException $e) {
            $this->result = [];
            if ($this->logger) {
                $this->logger->info('Response error: ', ['errorMessage' => $e->getMessage()]);
            }
            return $e->getMessage() . "\n";
        }
    }

    /**
     * @return mixed|string
     */
    public function getCategories() {
        return $this->get('categories');
    }

    /**
     * @param string $id
     * @return mixed|string
     */
    public function getById(string $id) {
        return $this->get('images/'.$id);
    }

    /**
     * @param $params
     * @return mixed|string
     */
    public function getByParameters($params=[]) {
        return $this->get('images/search', [
            'query' => empty($params) ? $this->params : $params,
        ]);
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
        if (array_key_exists($value, self::ORDER_VARIANTS)){
            $this->params['order'] = self::ORDER_VARIANTS[$value];
        }
        return $this;
    }

    /**
     * @return array
     */
    public function getParams() {
        return $this->params;
    }

}