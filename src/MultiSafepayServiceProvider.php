<?php

namespace MultiSafepay\Laravel;

use Exception;
use Illuminate\Support\ServiceProvider;
use MultiSafepay\Api\CategoryManager;
use MultiSafepay\Api\GatewayManager;
use MultiSafepay\Api\IssuerManager;
use MultiSafepay\Api\TransactionManager;
use MultiSafepay\Sdk;

class MultiSafepayServiceProvider extends ServiceProvider
{
    const CONFIG_KEY = 'services.multisafepay';
    protected $environments = [
        'test',
        'live',
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/multisafepay.php', self::CONFIG_KEY
        );

        $this->app->singleton(Sdk::class, function ($app, $parameters) {
            $apiKey = $parameters['apikey'] ?? $this->getConfig('apikey');
            $environment = $parameters['environment'] ?? $this->getConfig('environment', 'live');
            $isProduction = $this->getIsProduction($environment);

            return new Sdk($apiKey, $isProduction);
        });

        $this->app->singleton(TransactionManager::class, function ($app, $parameters) {
            return $app->makeWith(Sdk::class, $parameters)->getTransactionManager();
        });

        $this->app->singleton(GatewayManager::class, function ($app, $parameters) {
            return $app->makeWith(Sdk::class, $parameters)->getGatewayManager();
        });

        $this->app->singleton(IssuerManager::class, function ($app, $parameters) {
            return $app->makeWith(Sdk::class, $parameters)->getIssuerManager();
        });

        $this->app->singleton(CategoryManager::class, function ($app, $parameters) {
            return $app->makeWith(Sdk::class, $parameters)->getCategoryManager();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if (!$this->isLumen() && $this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/multisafepay.php' => config_path('multisafepay.php'),
            ]);
        }
    }

    protected function getConfig($key, $default = null)
    {
        return $this->app['config'][self::CONFIG_KEY . '.' . $key];
    }

    protected function isLumen()
    {
        return get_class($this->app) != 'Illuminate\Foundation\Application';
    }

    protected function getIsProduction($environment)
    {
        $environment = strtolower($environment);
        if (!in_array($environment, $this->environments)) {
            $supportedEnvironments = join(" and ", $this->environments);
            throw new Exception("Not supported environment $environment selected," .
                "only the environments $supportedEnvironments are supported.");
        }
        return 'live' === $environment;
    }
}
