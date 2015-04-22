<?php namespace Ixudra\Portfolio\Services\Html;


use App;

use Ixudra\Core\Services\Html\BaseViewFactory;
use Ixudra\Portfolio\Models\Company;

class CompanyViewFactory extends BaseViewFactory {

    public function index($input = array())
    {
        if( empty($input) ) {
            $input = array(
                'query'         => ''
            );
        }

        return $this->prepareFilter( 'portfolio::companies.index', $input );
    }

    public function create($input = null)
    {
        if( $input == null ) {
            $input = App::make('\Ixudra\Portfolio\Services\Input\CompanyInputHelper')->getDefaultInput();
        }

        return $this->prepareForm('portfolio::companies.create', 'create', $input);
    }

    public function show(Company $company)
    {
        $this->addParameter('company', $company);

        return $this->makeView( 'portfolio::companies.show' );
    }

    public function edit(Company $company, $input = null)
    {
        if( $input == null ) {
            $input = App::make('\Ixudra\Portfolio\Services\Input\CompanyInputHelper')->getInputForModel( $company );
        }

        $this->addParameter('company', $company);

        return $this->prepareForm('portfolio::companies.edit', 'update', $input);
    }


    protected function prepareFilter($template, $input)
    {
        $searchInput = App::make('\Ixudra\Portfolio\Services\Input\CompanyInputHelper')->getInputForSearch( $input );
        $companies = App::make('\Ixudra\Portfolio\Repositories\Eloquent\EloquentCompanyRepository')->search( $searchInput );

        $this->addParameter('companies', $companies);
        $this->addParameter('input', $input);

        return $this->makeView( $template );
    }

    protected function prepareForm($template, $formName, $input)
    {
        $countries = App::make('\Ixudra\Portfolio\Services\Form\AddressFormHelper')->getCountriesAsSelectList();

        $requiredFields = App::make('\Ixudra\Portfolio\Services\Validation\CompanyValidationHelper')->getRequiredFormFields( $formName );

        $this->addParameter('countries', $countries);
        $this->addParameter('input', $input);
        $this->addParameter('requiredFields', $requiredFields);
        $this->addParameter('prefix', 'company');

        return $this->makeView( $template );
    }

}
