## Thawani Library for Laravel
This package is to add Thawani support to Laravel

## Installation:
```bash
composer require phpawcom/thawani_laravel
```
Then migrate to add Thawani table:
```bash
php artisan migrate
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
For alias:
```php
'aliases' => [
    S4D\Laravel\Thawani\Thawani::class,
]
```

## Usage:
First you need to add routes to your routes/web.php:
```php
// To generate payment URL and redirect to Thawani
Route::get('pay', [\App\Http\Controllers\TestThawaniController::class, 'pay'])->name('thawani.pay');
// To check payment and update the status
Route::get('check/{session_id?}', [\App\Http\Controllers\TestThawaniController::class, 'check'])->name('thawani.check');
// To show cancellation message
Route::get('cancel/{session_id?}', [\App\Http\Controllers\TestThawaniController::class, 'cancel'])->name('thawani.cancel');
```
In your controller:
```php
<?php

namespace App\Http\Controllers;

use S4D\Laravel\Thawani\Thawani;

class TestThawaniController extends Controller
{
    public function pay(){
        // Note that we use Routes names in setReturnUrls() method
        Thawani::setClientReference(1)->setReturnUrls('thawani.check', 'thawani.cancel')->setProducts([
            ['name' => 'test test test test test test test test test test test test ', 'unit_amount' => 100, 'quantity' => 1],
            ['name' => 'test', 'unit_amount' => 100, 'quantity' => 1],
        ])->setMetadata([
            'customer_name' => 'Fulan Al Fulani',
            'customer_phone' => '90000000',
            'customer_email' => 'email@domain.tld',
        ])->redirectToPayment();
    }
    public function check($session_id){
        return Response('Payment is '.(Thawani::paymentStatus($session_id) == 1? 'successful' : 'failed'));
    }
    public function cancel($session_id){
        Thawani::cancelPayment($session_id);
        return Response('has been cancelled');
    }
}

```

Note that you can get the payment URL without redirecting in this way:
```php
$url = Thawani::setClientReference(1)->setReturnUrls('thawani.check', 'thawani.cancel')->setProducts([
    ['name' => 'test test test test test test test test test test test test ', 'unit_amount' => 100, 'quantity' => 1],
    ['name' => 'test', 'unit_amount' => 100, 'quantity' => 1],
])->setMetadata([
    'customer_name' => 'Fulan Al Fulani',
    'customer_phone' => '90000000',
    'customer_email' => 'email@domain.tld',
])->getPaymentUrl();
```

If you don't specify URL in setReturnUrls() method, the package will use its default views




