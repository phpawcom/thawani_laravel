## Thawani Library for Laravel
This package is to add Thawani support to Laravel

## Installation:
```bash
composer require phpawcom/thawani_laravel
```

### publish config:
```bash
php artisan vendor:publish --provider "S4D\Laravel\Thawani\ThawaniServiceProvider"
```

The S4D\Laravel\Thawani\ThawaniServiceProvider is auto-discovered and registered by default.
If you want to register it yourself, add the ServiceProvider in config/app.php:
```php
'providers' => [
    S4D\Laravel\Thawani\ThawaniServiceProvider::class,
]
```
