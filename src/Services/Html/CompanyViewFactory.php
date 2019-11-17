<?php namespace Ixudra\Portfolio\Services\Html;


use App;

use Ixudra\Core\Services\Html\BaseViewFactory;
use Ixudra\Portfolio\Interfaces\Models\CompanyInterface;
use Ixudra\Portfolio\Interfaces\Repositories\CompanyRepositoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Form\AddressFormHelperInterface;
use Ixudra\Portfolio\Interfaces\Services\Html\CompanyViewFactoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Input\CompanyInputHelperInterface;
use Ixudra\Portfolio\Interfaces\Services\Validation\CompanyValidationHelperInterface;

class CompanyViewFactory extends BaseViewFactory implements CompanyViewFactoryInterface {

    public function index($input = array())
    {
        if( empty($input) ) {
            $input = array(
                'query'         => '',
            );
        }

        return $this->prepareFilter( 'portfolio::companies.index', $input );
    }

    public function create($input = null)
    {
        if( $input === null ) {
            $input = App::make( CompanyInputHelperInterface::class )->getDefaultInput();
        }

        return $this->prepareForm('portfolio::companies.create', 'create', $input);
    }

    public function show(CompanyInterface $company)
    {
        $this->addParameter('company', $company);

        return $this->makeView( 'portfolio::companies.show' );
    }

    public function edit(CompanyInterface $company, $input = null)
    {
        if( $input === null ) {
            $input = App::make( CompanyInputHelperInterface::class )->getInputForModel( $company );
        }

        $this->addParameter('company', $company);

        return $this->prepareForm('portfolio::companies.edit', 'update', $input);
    }


    protected function prepareFilter($template, $input)
    {
        $searchInput = App::make( CompanyInputHelperInterface::class )->getInputForSearch( $input );
        $companies = App::make( CompanyRepositoryInterface::class )->search( $searchInput );

        $this->addParameter('companies', $companies);
        $this->addParameter('input', $input);

        return $this->makeView( $template );
    }

    protected function prepareForm($template, $formName, $input)
    {
        $countries = App::make( AddressFormHelperInterface::class )->getCountriesAsSelectList();

        $requiredFields = App::make( CompanyValidationHelperInterface::class )->getRequiredFormFields( $formName );

        $this->addParameter('countries', $countries);
        $this->addParameter('input', $input);
        $this->addParameter('requiredFields', $requiredFields);
        $this->addParameter('prefix', 'company');

        return $this->makeView( $template );
    }

}
