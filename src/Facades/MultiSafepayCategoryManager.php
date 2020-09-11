<?php

namespace MultiSafepay\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use MultiSafepay\Api\CategoryManager;


class MultiSafepayCategoryManager extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return CategoryManager::class;
    }
}
