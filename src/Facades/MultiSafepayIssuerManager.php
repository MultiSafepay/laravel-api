<?php

namespace MultiSafepay\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use MultiSafepay\Api\IssuerManager;


class MultiSafepayIssuerManager extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return IssuerManager::class;
    }
}
