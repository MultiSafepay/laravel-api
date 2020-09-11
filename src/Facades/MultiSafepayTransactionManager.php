<?php

namespace MultiSafepay\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use MultiSafepay\Api\TransactionManager;


class MultiSafepayTransactionManager extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return TransactionManager::class;
    }
}
