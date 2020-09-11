<?php

namespace MultiSafepay\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use MultiSafepay\Sdk;

/**
 * @method static array processAPIRequest($http_method, $api_method, $http_body = NULL)
 *
 * @see \MultiSafepay\Sdk
 */

class MultiSafepay extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Sdk::class;
    }
}
