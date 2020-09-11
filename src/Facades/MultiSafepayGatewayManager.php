<?php

namespace MultiSafepay\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use MultiSafepay\Api\GatewayManager;


class MultiSafepayGatewayManager extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return GatewayManager::class;
    }
}
