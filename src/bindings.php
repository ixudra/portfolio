<?php


/**
 * Model bindings
 */

$this->app->bind( Ixudra\Portfolio\Interfaces\Models\AddressInterface::class, Config::get('bindings.models.address') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Models\CompanyInterface::class, Config::get('bindings.models.company') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Models\CustomerInterface::class, Config::get('bindings.models.customer') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Models\PersonInterface::class, Config::get('bindings.models.person') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Models\ProjectInterface::class, Config::get('bindings.models.project') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Models\ProjectTypeInterface::class, Config::get('bindings.models.projectType') );



/**
 * Observer bindings
 */

$this->app->bind( Ixudra\Portfolio\Interfaces\Observers\CustomerModelObserverInterface::class, Ixudra\Portfolio\Observers\CustomerModelObserver::class );



/**
 * Presenter bindings
 */

$this->app->bind( Ixudra\Portfolio\Interfaces\Presenters\AddressPresenterInterface::class, Config::get('bindings.presenters.address') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Presenters\CompanyPresenterInterface::class, Config::get('bindings.presenters.company') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Presenters\CustomerPresenterInterface::class, Config::get('bindings.presenters.customer') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Presenters\PersonPresenterInterface::class, Config::get('bindings.models.presenters') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Presenters\ProjectPresenterInterface::class, Config::get('bindings.presenters.project') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Presenters\ProjectTypePresenterInterface::class, Config::get('bindings.presenters.projectType') );



/**
 * Repository bindings
 */

$this->app->bind( Ixudra\Portfolio\Interfaces\Repositories\AddressRepositoryInterface::class, Config::get('bindings.repositories.address') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Repositories\CompanyRepositoryInterface::class, Config::get('bindings.repositories.company') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Repositories\CustomerRepositoryInterface::class, Config::get('bindings.repositories.customer') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Repositories\PersonRepositoryInterface::class, Config::get('bindings.repositories.person') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Repositories\ProjectRepositoryInterface::class, Config::get('bindings.repositories.project') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Repositories\ProjectTypeRepositoryInterface::class, Config::get('bindings.repositories.projectType') );



/**
 * Factory bindings
 */

$this->app->bind( Ixudra\Portfolio\Interfaces\Services\Factories\AddressFactoryInterface::class, Config::get('bindings.factories.address') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Services\Factories\CompanyFactoryInterface::class, Config::get('bindings.factories.company') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Services\Factories\CustomerFactoryInterface::class, Config::get('bindings.factories.customer') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Services\Factories\PersonFactoryInterface::class, Config::get('bindings.factories.person') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Services\Factories\ProjectFactoryInterface::class, Config::get('bindings.factories.project') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Services\Factories\ProjectTypeFactoryInterface::class, Config::get('bindings.factories.projectType') );



/**
 * Form helper bindings
 */

$this->app->bind( Ixudra\Portfolio\Interfaces\Services\Form\AddressFormHelperInterface::class, Config::get('bindings.formHelpers.address') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Services\Form\CompanyFormHelperInterface::class, Config::get('bindings.formHelpers.company') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Services\Form\CustomerFormHelperInterface::class, Config::get('bindings.formHelpers.customer') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Services\Form\PersonFormHelperInterface::class, Config::get('bindings.formHelpers.person') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Services\Form\ProjectFormHelperInterface::class, Config::get('bindings.formHelpers.project') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Services\Form\ProjectTypeFormHelperInterface::class, Config::get('bindings.formHelpers.projectType') );



/**
 * View factory bindings
 */

$this->app->bind( Ixudra\Portfolio\Interfaces\Services\Html\AddressViewFactoryInterface::class, Config::get('bindings.viewFactories.address') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Services\Html\CompanyViewFactoryInterface::class, Config::get('bindings.viewFactories.company') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Services\Html\CustomerViewFactoryInterface::class, Config::get('bindings.viewFactories.customer') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Services\Html\PersonViewFactoryInterface::class, Config::get('bindings.viewFactories.person') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Services\Html\ProjectViewFactoryInterface::class, Config::get('bindings.viewFactories.project') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Services\Html\ProjectTypeViewFactoryInterface::class, Config::get('bindings.viewFactories.projectType') );



/**
 * Input helper bindings
 */

$this->app->bind( Ixudra\Portfolio\Interfaces\Services\Input\AddressInputHelperInterface::class, Config::get('bindings.inputHelpers.address') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Services\Input\CompanyInputHelperInterface::class, Config::get('bindings.inputHelpers.company') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Services\Input\CustomerInputHelperInterface::class, Config::get('bindings.inputHelpers.customer') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Services\Input\PersonInputHelperInterface::class, Config::get('bindings.inputHelpers.person') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Services\Input\ProjectInputHelperInterface::class, Config::get('bindings.inputHelpers.project') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Services\Input\ProjectTypeInputHelperInterface::class, Config::get('bindings.inputHelpers.projectType') );



/**
 * Validation helper bindings
 */

$this->app->bind( Ixudra\Portfolio\Interfaces\Services\Validation\AddressValidationHelperInterface::class, Config::get('bindings.validationHelpers.address') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Services\Validation\CompanyValidationHelperInterface::class, Config::get('bindings.validationHelpers.company') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Services\Validation\CustomerValidationHelperInterface::class, Config::get('bindings.validationHelpers.customer') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Services\Validation\PersonValidationHelperInterface::class, Config::get('bindings.validationHelpers.person') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Services\Validation\ProjectValidationHelperInterface::class, Config::get('bindings.validationHelpers.project') );
$this->app->bind( Ixudra\Portfolio\Interfaces\Services\Validation\ProjectTypeValidationHelperInterface::class, Config::get('bindings.validationHelpers.projectType') );


