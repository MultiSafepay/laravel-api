<?php

if (! function_exists('multisafepay')) {
    function multisafepay($apikey = null, $environment = null)
    {
        return app()->makeWith(\MultiSafepay\Sdk::class, ['apikey' => $apikey, 'environment' => $environment]);
    }
}

if (! function_exists('multisafepayTransactionManager')) {
    function multisafepayTransactionManager($apikey = null, $environment = null)
    {
        return app()->makeWith(\MultiSafepay\Api\TransactionManager::class, ['apikey' => $apikey, 'environment' => $environment]);
    }
}

if (! function_exists('multisafepayGatewayManager')) {
    function multisafepayGatewayManager($apikey = null, $environment = null)
    {
        return app()->makeWith(\MultiSafepay\Api\GatewayManager::class, ['apikey' => $apikey, 'environment' => $environment]);
    }
}

if (! function_exists('multisafepayIssuerManager')) {
    function multisafepayIssuerManager($apikey = null, $environment = null)
    {
        return app()->makeWith(\MultiSafepay\Api\IssuerManager::class, ['apikey' => $apikey, 'environment' => $environment]);
    }
}

if (! function_exists('multisafepayCategoryManager')) {
    function multisafepayCategoryManager($apikey = null, $environment = null)
    {
        return app()->makeWith(\MultiSafepay\Api\CategoryManager::class, ['apikey' => $apikey, 'environment' => $environment]);
    }
}

if (! function_exists('multisafepayApiTokenManager')) {
    function multisafepayApiTokenManager($apikey = null, $environment = null)
    {
        return app()->makeWith(\MultiSafepay\Api\ApiTokenManager::class, ['apikey' => $apikey, 'environment' => $environment]);
    }
}
