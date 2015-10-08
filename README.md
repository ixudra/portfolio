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

Add the service provider to your `config/app.php` file. Additionally, you will also need to include the service providers of the package dependencies:

```php

    providers     => array(

        //...
        'Illuminate\Html\HtmlServiceProvider',
        'Ixudra\Portfolio\PortfolioServiceProvider',
        'Ixudra\Translation\TranslationServiceProvider',
        'Ixudra\Imageable\ImageableServiceProvider',

    ),

```

Though the package does not have a facade on itself, it does rely on several facades of dependencies in order to function correctly. You will need to add these to your `config/app.php` file as well:

```php

    facades     => array(

        //...
        'HTML'              => 'Illuminate\Html\HtmlFacade',
        'Form'              => 'Illuminate\Html\FormFacade',
        'Translate'         => 'Ixudra\Translation\Facades\Translation',

    ),

```

Note that these facades are only required if you would like to use the package as it comes out of the box. It is not strictly mandatory to use these facades in order to leverage the package. It is possible to use it without them, though it would require a great deal of customisation on your part.

Run package migrations using artisan:

```php

    // Run the migration for the ixudra/portfolio package
    php artisan migrate --package="ixudra/portfolio"

    // Run the migration for the ixudra/imageable package
    php artisan migrate --package="ixudra/imageable"

```

Alternatively, you can also publish the migrations using artisan:

```php

    // Publish all resources from all packages
    php artisan vendor:publish

    // Publish only the resources of the package
    php artisan vendor:publish --provider="Ixudra\\Portfolio\\PortfolioServiceProvider" --tag="migrations"

    // Publish only the resources of ixudra/imageable package
    php artisan vendor:publish --provider="Ixudra\\Imageable\\ImageableServiceProvider" --tag="migrations"

```



## Usage

Once all dependencies have been included and migrations have been run, you can start using the package. Out of the box, the package provides you with two resourceful controllers (`ProjectController` and `CustomerController`) that can be accessed. The routes provided by these controllers are automatically included via the package service provider and can be accessed out of the box. If necessary you can use the following example to make links to the index pages provided by these controllers:

```php

    // controller is accessible via the url http://yourAppName/admin/customers
    <li>{!! HTML::linkRoute('admin.customers.index', Translate::recursive('portfolio::admin.menu.title.index', array('model' => 'customer'))) !!}</li>

    // controller is accessible via the url http://yourAppName/admin/projects
    <li>{!! HTML::linkRoute('admin.projects.index', Translate::recursive('portfolio::admin.menu.title.index', array('model' => 'project'))) !!}</li>

    // controller is accessible via the url http://yourAppName/admin/projectTypes
    <li>{!! HTML::linkRoute('admin.projectTypes.index', Translate::recursive('portfolio::admin.menu.title.index', array('model' => 'projectType'))) !!}</li>

```


### Extending the package

Coming soon!



That's all there is to it! Have fun!




## License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)




## Contact

Jan Oris (developer)

- Email: jan.oris@ixudra.be
- Telephone: +32 496 94 20 57

