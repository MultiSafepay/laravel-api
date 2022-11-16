<p align="center">
  <img src="https://raw.githubusercontent.com/MultiSafepay/MultiSafepay-logos/master/MultiSafepay-logo-color.svg" alt="MultiSafepay logo" width="400px" position="center">
</p>

# MultiSafepay package for Laravel
This is a package for Laravel which wraps the [MultiSafepay/php-sdk](https://github.com/MultiSafepay/php-sdk) to create a convenient to use integration with MultiSafepay. The package supports automatically loading API settings from the Laravel configuration and is callable by either the helper methods, a service container or through a dedicated facade.
It is also compatible with Laravel Lumen.

[![Latest Stable Version](https://img.shields.io/packagist/v/multisafepay/laravel-api)](https://packagist.org/packages/multisafepay/laravel-api)

## About MultiSafepay ##
MultiSafepay is a Dutch payment services provider, which takes care of contracts, processing transactions, and collecting payment for a range of local and international payment methods. Start selling online today and manage all your transactions in one place!

## Installation
Run `composer require multisafepay/laravel-api`.

The MultiSafepay/laravel-api will be auto-discovered by Laravel

_NOTE: within the Lumen instance, it is possible that you are receiving a message: ```missing psr/http-client-implementation```_ If this happens please install one of the following [Virtual packages](https://packagist.org/providers/psr/http-client-implementation)

_NOTE: within the Lumen instance, you need to install the Facades and Providers as following within the `bootstrap/app.php`_

```PHP  
$app->register(\MultiSafepay\Laravel\MultiSafepayServiceProvider::class);  
  
$app->withFacades(true,  [
    \MultiSafepay\Laravel\Facades\MultiSafepay::class => "MultiSafepay",
    \MultiSafepay\Laravel\Facades\MultiSafepayTransactionManager::class => "MultiSafepayOrders",
    \MultiSafepay\Laravel\Facades\MultiSafepayGatewayManager::class => "MultiSafepayGateways",
    \MultiSafepay\Laravel\Facades\MultiSafepayCategoryManager::class => "MultiSafepayIssuers",
]);
```

## Configuration
Set the following environment variables in your `.env` file:

- `MULTISAFEPAY_APIKEY`

Set this to your API key, which can be found within [MultiSafepay Control](https://docs.multisafepay.com/tools/multisafepay-control/get-your-api-key/)

- `MULTISAFEPAY_ENVIRONMENT`

Set this to `live` or `test` depending on if you want to process transactions on our LIVE or TEST platform.

## Example Usage
The transaction api can be used in three ways;
```PHP
//Using helper function
$transaction = multisafepayTransactionManager('apikey', 'environment')->get('id');
//Using service container
$transactionManager = $app->makeWith(TransactionManager::class, ['apikey' => 'xxxx', 'environment' => 'live']);
$transaction = $transactionManager->get('id');
//Using facade accessor
$transaction = MultiSafepayTransactionManager::get('id');
```

For an extended usage documentation please check the [PHP-SDK usage file](https://github.com/MultiSafepay/php-sdk/blob/master/USAGE.md)

## Support
You can create issues on our repository. If you need any additional help or support, please contact <a href="mailto:integration@multisafepay.com">integration@multisafepay.com</a>

## A gift for your contribution
We look forward to receiving your input. Have you seen an opportunity to change things for better? We would like to invite you to create a pull request on GitHub.
Are you missing something and would like us to fix it? Suggest an improvement by sending us an [email](mailto:integration@multisafepay.com) or by creating an issue.

What will you get in return? A brand new designed MultiSafepay t-shirt which will make you part of the team!

## License
[Open Software License (OSL 3.0)](https://github.com/MultiSafepay/laravel-api/blob/master/LICENSE.md)

## Want to be part of the team?
Are you a developer interested in working at MultiSafepay? [View](https://www.multisafepay.com/careers/#jobopenings) our job openings and feel free to get in touch with us.

