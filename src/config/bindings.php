<?php


    return array(

        'controllers'                       => array(

            'address'                           => 'Ixudra\Portfolio\Http\Controllers\AddressController',
            'company'                           => 'Ixudra\Portfolio\Http\Controllers\CompanyController',
            'customer'                          => 'Ixudra\Portfolio\Http\Controllers\CustomerController',
            'person'                            => 'Ixudra\Portfolio\Http\Controllers\PersonController',
            'project'                           => 'Ixudra\Portfolio\Http\Controllers\ProjectController',
            'projectType'                       => 'Ixudra\Portfolio\Http\Controllers\ProjectTypeController',

        ),

        'requests'                          => array(

            'address'                           => array(
                'create'                            => 'Ixudra\Portfolio\Http\Requests\Addresses\CreateAddressFormRequest',
                'filter'                            => 'Ixudra\Portfolio\Http\Requests\Addresses\FilterAddressFormRequest',
                'update'                            => 'Ixudra\Portfolio\Http\Requests\Addresses\UpdateAddressFormRequest',
            ),

            'company'                           => array(
                'create'                            => 'Ixudra\Portfolio\Http\Requests\Companies\CreateCompanyFormRequest',
                'filter'                            => 'Ixudra\Portfolio\Http\Requests\Companies\FilterCompanyFormRequest',
                'update'                            => 'Ixudra\Portfolio\Http\Requests\Companies\UpdateCompanyFormRequest',
            ),

            'customer'                          => array(
                'create'                            => 'Ixudra\Portfolio\Http\Requests\Customers\CreateCustomerFormRequest',
                'filter'                            => 'Ixudra\Portfolio\Http\Requests\Customers\FilterCustomerFormRequest',
                'update'                            => 'Ixudra\Portfolio\Http\Requests\Customers\UpdateCustomerFormRequest',
            ),

            'person'                            => array(
                'create'                            => 'Ixudra\Portfolio\Http\Requests\People\CreatePersonFormRequest',
                'filter'                            => 'Ixudra\Portfolio\Http\Requests\People\FilterPersonFormRequest',
                'update'                            => 'Ixudra\Portfolio\Http\Requests\People\UpdatePersonFormRequest',
            ),

            'project'                           => array(
                'create'                            => 'Ixudra\Portfolio\Http\Requests\Projects\CreateProjectFormRequest',
                'filter'                            => 'Ixudra\Portfolio\Http\Requests\Projects\FilterProjectFormRequest',
                'update'                            => 'Ixudra\Portfolio\Http\Requests\Projects\UpdateProjectFormRequest',
            ),

            'projectType'                       => array(
                'create'                            => 'Ixudra\Portfolio\Http\Requests\ProjectTypes\CreateProjectTypeFormRequest',
                'filter'                            => 'Ixudra\Portfolio\Http\Requests\ProjectTypes\FilterProjectTypeFormRequest',
                'update'                            => 'Ixudra\Portfolio\Http\Requests\ProjectTypes\UpdateProjectTypeFormRequest',
            ),

        ),

        'models'                            => array(

            'address'                           => 'Ixudra\Portfolio\models\Address',
            'company'                           => 'Ixudra\Portfolio\models\Company',
            'customer'                          => 'Ixudra\Portfolio\models\Customer',
            'person'                            => 'Ixudra\Portfolio\models\Person',
            'project'                           => 'Ixudra\Portfolio\models\Project',
            'projectType'                       => 'Ixudra\Portfolio\models\ProjectType',

        ),

        'observers'                        => array(

            'customer'                          => 'Ixudra\Portfolio\Observers\CustomerModelObserver',

        ),

        'presenters'                        => array(

            'address'                           => 'Ixudra\Portfolio\Presenters\AddressPresenter',
            'company'                           => 'Ixudra\Portfolio\Presenters\CompanyPresenter',
            'customer'                          => 'Ixudra\Portfolio\Presenters\CustomerPresenter',
            'person'                            => 'Ixudra\Portfolio\Presenters\PersonPresenter',
            'project'                           => 'Ixudra\Portfolio\Presenters\ProjectPresenter',
            'projectType'                       => 'Ixudra\Portfolio\Presenters\ProjectTypePresenter',

        ),

        'repositories'                      => array(

            'address'                           => 'Ixudra\Portfolio\Repositories\Eloquent\EloquentAddressRepository',
            'company'                           => 'Ixudra\Portfolio\Repositories\Eloquent\EloquentCompanyRepository',
            'customer'                          => 'Ixudra\Portfolio\Repositories\Eloquent\EloquentCustomerRepository',
            'person'                            => 'Ixudra\Portfolio\Repositories\Eloquent\EloquentPersonRepository',
            'project'                           => 'Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectRepository',
            'projectType'                       => 'Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectTypeRepository',

        ),

        'factories'                         => array(

            'address'                           => 'Ixudra\Portfolio\Services\Factories\AddressFactory',
            'company'                           => 'Ixudra\Portfolio\Services\Factories\CompanyFactory',
            'customer'                          => 'Ixudra\Portfolio\Services\Factories\CustomerFactory',
            'person'                            => 'Ixudra\Portfolio\Services\Factories\PersonFactory',
            'project'                           => 'Ixudra\Portfolio\Services\Factories\ProjectFactory',
            'projectType'                       => 'Ixudra\Portfolio\Services\Factories\ProjectTypeFactory',

        ),

        'formHelpers'                       => array(

            'address'                           => 'Ixudra\Portfolio\Services\Form\AddressFormHelper',
            'company'                           => 'Ixudra\Portfolio\Services\Form\CompanyFormHelper',
            'customer'                          => 'Ixudra\Portfolio\Services\Form\CustomerFormHelper',
            'person'                            => 'Ixudra\Portfolio\Services\Form\PersonFormHelper',
            'project'                           => 'Ixudra\Portfolio\Services\Form\ProjectFormHelper',
            'projectType'                       => 'Ixudra\Portfolio\Services\Form\ProjectTypeFormHelper',

        ),

        'viewFactories'                     => array(

            'address'                           => 'Ixudra\Portfolio\Services\Html\AddressViewFactory',
            'company'                           => 'Ixudra\Portfolio\Services\Html\CompanyViewFactory',
            'customer'                          => 'Ixudra\Portfolio\Services\Html\CustomerViewFactory',
            'person'                            => 'Ixudra\Portfolio\Services\Html\PersonViewFactory',
            'project'                           => 'Ixudra\Portfolio\Services\Html\ProjectViewFactory',
            'projectType'                       => 'Ixudra\Portfolio\Services\Html\ProjectTypeViewFactory',

        ),

        'inputHelpers'                      => array(

            'address'                           => 'Ixudra\Portfolio\Services\Input\AddressInputHelper',
            'company'                           => 'Ixudra\Portfolio\Services\Input\CompanyInputHelper',
            'customer'                          => 'Ixudra\Portfolio\Services\Input\CustomerInputHelper',
            'person'                            => 'Ixudra\Portfolio\Services\Input\PersonInputHelper',
            'project'                           => 'Ixudra\Portfolio\Services\Input\ProjectInputHelper',
            'projectType'                       => 'Ixudra\Portfolio\Services\Input\ProjectTypeInputHelper',

        ),

        'validationHelpers'                 => array(

            'address'                           => 'Ixudra\Portfolio\Services\Validation\AddressValidationHelper',
            'company'                           => 'Ixudra\Portfolio\Services\Validation\CompanyValidationHelper',
            'customer'                          => 'Ixudra\Portfolio\Services\Validation\CustomerValidationHelper',
            'person'                            => 'Ixudra\Portfolio\Services\Validation\PersonValidationHelper',
            'project'                           => 'Ixudra\Portfolio\Services\Validation\ProjectValidationHelper',
            'projectType'                       => 'Ixudra\Portfolio\Services\Validation\ProjectTypeValidationHelper',

        ),

    );