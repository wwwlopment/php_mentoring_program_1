# REST API client

### Installation
$ composer install
$ docker-compose up

Open in browser at http://0.0.0.0:8000

### Description
Create a simple REST API client for https://developer.oxforddictionaries.com/ or https://docs.thecatapi.com/ (or any other REST API's) - cover only a couple endpoints

Make sure:
- You use http://docs.guzzlephp.org/en/stable/ as HTTP client
- You can switch your APP to offline mode and get stubbed results
- You can turn on logging of all requests/responses
- You can turn on response caching
- You follow SOLID principles