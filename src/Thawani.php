<?php

namespace S4D\Laravel\Thawani;

use Illuminate\Support\Facades\Facade;
use S4D\Laravel\Thawani\Services\ThawaniService;

/**
 * @method static array generatePaymentUrl(array $input)
 * @method static array paymentUrl(string|int $referenceId, array $products, array $metadata)
 * @method static string getSessionId()
 */
class Thawani extends Facade {
    protected static function getFacadeAccessor() {
        return ThawaniService::class;
    }
}
