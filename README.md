ixudra/portfolio
=====================

Custom PHP portfolio package for the Laravel 5 framework - developed by [Ixudra](http://ixudra.be).

This package can be used by anyone at any given time, but keep in mind that it is optimized for my personal custom workflow. It may not suit your project perfectly and modifications may be in order.



## Installation

Pull this package in through Composer.

```js

    {
        "require": {
            "ixudra/portfolio": "0.*"
        }
    }

```

Add the service provider to your `config/app.php` file

```php

    providers     => array(

        //...
        'Ixudra\Portfolio\PortfolioServiceProvider',

    )

```

Run package migrations using artisan:

```php

    php artisan migrate --package="ixudra/portfolio"

```

Alternatively, you can also publish the migrations using artisan:

```php

    // Publish all resources from all packages
    php artisan vendor:publish
    
    // Publish only the resources of the package
    php artisan vendor:publish --provider="Ixudra\\Portfolio\\PortfolioServiceProvider"

```



## Usage

Coming soon!


That's all there is to it! Have fun!




## License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)




## Contact

Jan Oris (developer)

- Email: jan.oris@ixudra.be
- Telephone: +32 496 94 20 57

