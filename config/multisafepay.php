<?php
return [
    'apikey' => env('MULTISAFEPAY_APIKEY'),
    'environment' => env('MULTISAFEPAY_ENVIRONMENT', 'live'),
    'plugin_version' => '1.2.0',
    'shop' => env('MULTISAFEPAY_APPLICATION_NAME'),
    'shop_version' => env('MULTISAFEPAY_APPLICATION_VERSION'),
];
