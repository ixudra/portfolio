<?php


/**
 * Model bindings
 */

$this->app->bind( 'Ixudra\Portfolio\Interfaces\Models\AddressInterface', Config::get('bindings.models.address') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Models\CompanyInterface', Config::get('bindings.models.company') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Models\CustomerInterface', Config::get('bindings.models.customer') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Models\PersonInterface', Config::get('bindings.models.person') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Models\ProjectInterface', Config::get('bindings.models.project') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Models\ProjectTypeInterface', Config::get('bindings.models.projectType') );



/**
 * Observer bindings
 */

$this->app->bind( 'Ixudra\Portfolio\Interfaces\Observers\CustomerModelObserverInterface', 'Ixudra\Portfolio\Observers\CustomerModelObserver' );



/**
 * Presenter bindings
 */

$this->app->bind( 'Ixudra\Portfolio\Interfaces\Presenters\AddressPresenterInterface', Config::get('bindings.presenters.address') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Presenters\CompanyPresenterInterface', Config::get('bindings.presenters.company') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Presenters\CustomerPresenterInterface', Config::get('bindings.presenters.customer') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Presenters\PersonPresenterInterface', Config::get('bindings.models.presenters') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Presenters\ProjectPresenterInterface', Config::get('bindings.presenters.project') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Presenters\ProjectTypePresenterInterface', Config::get('bindings.presenters.projectType') );



/**
 * Repository bindings
 */

$this->app->bind( 'Ixudra\Portfolio\Interfaces\Repositories\AddressRepositoryInterface', Config::get('bindings.repositories.address') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Repositories\CompanyRepositoryInterface', Config::get('bindings.repositories.company') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Repositories\CustomerRepositoryInterface', Config::get('bindings.repositories.customer') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Repositories\PersonRepositoryInterface', Config::get('bindings.repositories.person') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Repositories\ProjectRepositoryInterface', Config::get('bindings.repositories.project') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Repositories\ProjectTypeRepositoryInterface', Config::get('bindings.repositories.projectType') );



/**
 * Factory bindings
 */

$this->app->bind( 'Ixudra\Portfolio\Interfaces\Services\Factories\AddressFactoryInterface', Config::get('bindings.factories.address') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Services\Factories\CompanyFactoryInterface', Config::get('bindings.factories.company') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Services\Factories\CustomerFactoryInterface', Config::get('bindings.factories.customer') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Services\Factories\PersonFactoryInterface', Config::get('bindings.factories.person') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Services\Factories\ProjectFactoryInterface', Config::get('bindings.factories.project') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Services\Factories\ProjectTypeFactoryInterface', Config::get('bindings.factories.projectType') );



/**
 * Form helper bindings
 */

$this->app->bind( 'Ixudra\Portfolio\Interfaces\Services\Form\AddressFormHelperInterface', Config::get('bindings.formHelpers.address') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Services\Form\CompanyFormHelperInterface', Config::get('bindings.formHelpers.company') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Services\Form\CustomerFormHelperInterface', Config::get('bindings.formHelpers.customer') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Services\Form\PersonFormHelperInterface', Config::get('bindings.formHelpers.person') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Services\Form\ProjectFormHelperInterface', Config::get('bindings.formHelpers.project') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Services\Form\ProjectTypeFormHelperInterface', Config::get('bindings.formHelpers.projectType') );



/**
 * View factory bindings
 */

$this->app->bind( 'Ixudra\Portfolio\Interfaces\Services\Html\AddressViewFactoryInterface', Config::get('bindings.viewFactories.address') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Services\Html\CompanyViewFactoryInterface', Config::get('bindings.viewFactories.company') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Services\Html\CustomerViewFactoryInterface', Config::get('bindings.viewFactories.customer') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Services\Html\PersonViewFactoryInterface', Config::get('bindings.viewFactories.person') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Services\Html\ProjectViewFactoryInterface', Config::get('bindings.viewFactories.project') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Services\Html\ProjectTypeViewFactoryInterface', Config::get('bindings.viewFactories.projectType') );



/**
 * Input helper bindings
 */

$this->app->bind( 'Ixudra\Portfolio\Interfaces\Services\Input\AddressInputHelperInterface', Config::get('bindings.inputHelpers.address') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Services\Input\CompanyInputHelperInterface', Config::get('bindings.inputHelpers.company') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Services\Input\CustomerInputHelperInterface', Config::get('bindings.inputHelpers.customer') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Services\Input\PersonInputHelperInterface', Config::get('bindings.inputHelpers.person') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Services\Input\ProjectInputHelperInterface', Config::get('bindings.inputHelpers.project') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Services\Input\ProjectTypeInputHelperInterface', Config::get('bindings.inputHelpers.projectType') );



/**
 * Validation helper bindings
 */

$this->app->bind( 'Ixudra\Portfolio\Interfaces\Services\Validation\AddressValidationHelperInterface', Config::get('bindings.validationHelpers.address') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Services\Validation\CompanyValidationHelperInterface', Config::get('bindings.validationHelpers.company') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Services\Validation\CustomerValidationHelperInterface', Config::get('bindings.validationHelpers.customer') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Services\Validation\PersonValidationHelperInterface', Config::get('bindings.validationHelpers.person') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Services\Validation\ProjectValidationHelperInterface', Config::get('bindings.validationHelpers.project') );
$this->app->bind( 'Ixudra\Portfolio\Interfaces\Services\Validation\ProjectTypeValidationHelperInterface', Config::get('bindings.validationHelpers.projectType') );


