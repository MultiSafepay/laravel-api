<?php


namespace MultiSafepay\Laravel\Sdk;

use \Illuminate\Contracts\Foundation\Application;

class PluginDetails extends \MultiSafepay\Api\Transactions\OrderRequest\Arguments\PluginDetails
{
    public function __construct()
    {
        parent::__construct();
        $this->addApplicationName(config('multisafepay.shop'));
        $this->addApplicationVersion(config('multisafepay.shop_version'));
        $this->addPluginVersion(config('multisafepay.plugin_version'));
    }

    public function getData(): array
    {
        /** @var \Illuminate\Contracts\Foundation\Application $app */
        $app = app();

        return array_merge(parent::getData(), [
            'platform' => $app instanceof \Illuminate\Foundation\Application ? 'Laravel' : 'Lumen',
            'platform_version' => $app->version(),
        ]);
    }

}
