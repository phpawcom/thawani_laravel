<?php

namespace S4D\Laravel\Thawani;

use Illuminate\Support\Facades\Facade;
use S4D\Laravel\Thawani\Services\ThawaniService;

/**
 * @method static array generatePaymentUrl(array $input)
 * @method static array paymentUrl(string|int $referenceId, array $products, array $metadata)
 * @method static string getSessionId()
 * @method static array paymentDetails()
 * @method static void setReturnUrls(?string $success, ?string $cancel)
 * @method static void setClientReference(string $reference)
 * @method static void setProducts(array $products)
 * @method static void setMetadata(array $meta)
 * @method static string getPaymentUrl()
 * @method static \Illuminate\Http\RedirectResponse redirectToPayment()
 * @method static void cancelPayment(string $session_id)
 */
class Thawani extends Facade {
    protected static function getFacadeAccessor() {
        return ThawaniService::class;
    }
}
