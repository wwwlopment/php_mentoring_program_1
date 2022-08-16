# Socialite

### Installation
$ composer install
$ cp .env.example .env
$ docker-compose up
$ docker exec -it -w /var/www socialite_app php artisan migrate

### Description
If you are familiar with Laravel framework, create simple app, 
install https://laravel.com/docs/master/socialite and create custom OAuth provider 
(for example, for logging in with EPAM SSO)
