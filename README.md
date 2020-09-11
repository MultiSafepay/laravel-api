<p align="center">
  <img src="https://www.multisafepay.com/img/multisafepaylogo.svg" alt="MultiSafepay logo" width="400px" position="center">
</p>

# MultiSafepay package for Laravel
This is a package for Laravel which wraps the [MultiSafepay/php-sdk](https://github.com/MultiSafepay/php-sdk) to create a convenient to use integration with MultiSafepay. The package supports automatically loading API settings from the Laravel configuration and is callable by either the helper methods, a service container or through a dedicated facade.
It is also compatible with Laravel Lumen.

[![Latest Stable Version](https://img.shields.io/packagist/v/multisafepay/laravel-api)](https://packagist.org/packages/multisafepay/laravel-api)

## About MultiSafepay ##
MultiSafepay is a collecting payment service provider which means we take care of the agreements, technical details and payment collection required for each payment method. You can start selling online today and manage all your transactions from one place.

## Installation (Laravel 8)
Run `composer require multisafepay/laravel-api http-interop/http-factory-guzzle`.

## Installation (Laravel 7)
Run `composer require multisafepay/laravel-api php-http/guzzle6-adapter http-interop/http-factory-guzzle`.

## Lumen
### Provider
The following provider needs to be registered in the `bootstrap/app.php`. file.
```PHP  
$app->register(\MultiSafepay\Laravel\MultiSafepayServiceProvider::class);  
```  
### Facades 
To enable facades they need to be registered in the `bootstrap/app.php`.
```PHP  
$app->withFacades(true,  [
"MultiSafepay\\Laravel\\Facades\\MultiSafepay" => "MultiSafepay",
"MultiSafepay\\Laravel\\Facades\\MultiSafepayOrders" => "MultiSafepayOrders",
"MultiSafepay\\Laravel\\Facades\\MultiSafepayGateways" => "MultiSafepayGateways",
"MultiSafepay\\Laravel\\Facades\\MultiSafepayIssuers" => "MultiSafepayIssuers", 
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

