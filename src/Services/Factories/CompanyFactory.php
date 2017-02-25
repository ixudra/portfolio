<?php namespace Ixudra\Portfolio\Services\Factories;


use Ixudra\Core\Services\Factories\BaseFactory;
use Ixudra\Portfolio\Interfaces\Services\Factories\AddressFactoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Factories\CompanyFactoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Factories\CustomerFactoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Factories\PersonFactoryInterface;
use Ixudra\Portfolio\Interfaces\Models\CompanyInterface;

use App;
use Config;

class CompanyFactory extends BaseFactory implements CompanyFactoryInterface {

    protected $addressFactory;

    protected $personFactory;

    protected $customerFactory;


    public function __construct(AddressFactoryInterface $addressFactory, PersonFactoryInterface $personFactory, CustomerFactoryInterface $customerFactory)
    {
        $this->addressFactory = $addressFactory;
        $this->personFactory = $personFactory;
        $this->customerFactory = $customerFactory;
    }


    public function make($input, $prefix = '')
    {
        $address = $this->addressFactory->make( $this->extractCorporateAddressInput($input) );
        $representative = $this->personFactory->make( $this->extractRepresentativeInput($input), '', false );

        $company = $this->createModel( $this->extractCompanyInput( $address, $representative, $input, $prefix ) );
        $company->save();

        $this->customerFactory->make( $company );

        return $company;
    }

    public function modify(CompanyInterface $company, $input, $prefix = '')
    {
        $this->addressFactory->modify( $company->corporateAddress, $this->extractCorporateAddressInput($input) );
        $this->personFactory->modify( $company->representative, $this->extractRepresentativeInput($input), '', false );

        return $company->update( $this->extractCompanyInput( $company->corporateAddress, $company->representative, $input, $prefix ) );
    }

    protected function extractCorporateAddressInput($input)
    {
        $addressClassName = Config::get('bindings.models.address');

        return $this->extractInput( $input, $addressClassName::getDefaults(), 'corporate_address' );
    }

    protected function extractRepresentativeInput($input)
    {
        $personClassName = Config::get('bindings.models.person');

        return $this->extractInput( $input, $personClassName::getDefaults(), 'representative' );
    }

    protected function extractCompanyInput($address, $representative, $input, $prefix)
    {
        $companyClassName = Config::get('bindings.models.company');

        $results = $this->extractInput( $input, $companyClassName::getDefaults(), $prefix );

        $results[ 'corporate_address_id' ] = $address->id;
        $results[ 'billing_address_id' ] = $address->id;
        $results[ 'representative_id' ] = $representative->id;

        return $results;
    }

    protected function createModel($input = array())
    {
        return App::make( 'Ixudra\Portfolio\Interfaces\Models\CompanyInterface', array($input) );
    }

}