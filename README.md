<p align="center">
  <img src="https://camo.githubusercontent.com/517483ae0eaba9884f397e9af1c4adc7bbc231575ac66cc54292e00400edcd10/68747470733a2f2f7777772e6d756c7469736166657061792e636f6d2f66696c6561646d696e2f74656d706c6174652f696d672f6d756c7469736166657061792d6c6f676f2d69636f6e2e737667" width="400px" position="center">
</p>

# MultiSafepay package for Laravel
This is a package for Laravel which wraps the [MultiSafepay/php-sdk](https://github.com/MultiSafepay/php-sdk) for easy integration with MultiSafepay. The package:
- Supports automatically loading API settings from the Laravel configuration
- Is callable by either the helper methods, a service container, or through a dedicated facade
- Is compatible with Laravel Lumen

[![Latest stable version](https://img.shields.io/packagist/v/multisafepay/laravel-api)](https://packagist.org/packages/multisafepay/laravel-api)

## About MultiSafepay
MultiSafepay is a collecting payment service provider, which means we take care of electronic contracts, technical details, and payment collection for each payment method. You can start selling online today and manage all your transactions in one place.

## Installation (Laravel 7/8/9/10)
Run `composer require multisafepay/laravel-api http-interop/http-factory-guzzle`.

## Lumen
### Provider
Register the following provider in the `bootstrap/app.php`. file:
```PHP  
$app->register(\MultiSafepay\Laravel\MultiSafepayServiceProvider::class);  
```  
### Facades
To enable facades, register them in the `bootstrap/app.php`.
```PHP  
$app->withFacades(true,  [
"MultiSafepay\\Laravel\\Facades\\MultiSafepay" => "MultiSafepay",
"MultiSafepay\\Laravel\\Facades\\MultiSafepayOrders" => "MultiSafepayOrders",
"MultiSafepay\\Laravel\\Facades\\MultiSafepayGateways" => "MultiSafepayGateways",
"MultiSafepay\\Laravel\\Facades\\MultiSafepayIssuers" => "MultiSafepayIssuers", 
]);  
```

## Configuration
In your `.env` file, set the following environment variables:

- `MULTISAFEPAY_APIKEY`

Set this to your [site API key](https://docs.multisafepay.com/docs/sites#site-id-api-key-and-security-code):

- `MULTISAFEPAY_ENVIRONMENT`

Set this to `live` or `test` depending on whether you want to process transactions on our LIVE or TEST platform.

## Example
You can use the transaction API in 3 ways:
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
Create an issue on this repository or email <a href="mailto:integration@multisafepay.com">integration@multisafepay.com</a>

## Contributors
To contribute, create a pull request on this repository. We'll send you some MultiSafepay swag as a thank you!

## License
[Open Software License (OSL 3.0)](https://github.com/MultiSafepay/laravel-api/blob/master/LICENSE.md)

## Want to be part of the team?
Are you a developer interested in working at MultiSafepay? Check out our [job openings](https://www.multisafepay.com/careers/#jobopenings) and feel free to get in touch!
