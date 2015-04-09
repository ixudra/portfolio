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

        return $this->prepareForm( 'portfolio::companies.create', $input );
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

        return $this->prepareForm( 'portfolio::companies.edit', $input );
    }


    protected function prepareFilter($template, $input)
    {
        $searchInput = App::make('\Ixudra\Portfolio\Services\Input\CompanyInputHelper')->getInputForSearch( $input );
        $companies = App::make('\Ixudra\Portfolio\Repositories\Eloquent\EloquentCompanyRepository')->search( $searchInput, 25 );

        $this->addParameter('companies', $companies);
        $this->addParameter('input', $input);

        return $this->makeView( $template );
    }

    protected function prepareForm($template, $input)
    {
        $this->addParameter('input', $input);

        return $this->makeView( $template );
    }

}