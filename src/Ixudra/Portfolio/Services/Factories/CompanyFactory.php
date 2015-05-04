<?php namespace Ixudra\Portfolio\Services\Factories;


use Ixudra\Core\Services\Factories\BaseFactory;
use Ixudra\Portfolio\Interfaces\Services\Factories\AddressFactoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Factories\CompanyFactoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Factories\CustomerFactoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Factories\PersonFactoryInterface;
use Ixudra\Portfolio\Interfaces\Models\AddressInterface;
use Ixudra\Portfolio\Interfaces\Models\CompanyInterface;
use Ixudra\Portfolio\Interfaces\Models\PersonInterface;

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

        $company = CompanyInterface::create( $this->extractCompanyInput( $address, $representative, $input, $prefix ) );
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
        return $this->extractInput( $input, AddressInterface::getDefaults(), 'corporate_address' );
    }

    protected function extractRepresentativeInput($input)
    {
        return $this->extractInput( $input, PersonInterface::getDefaults(), 'representative' );
    }

    protected function extractCompanyInput($address, $representative, $input, $prefix)
    {
        $results = $this->extractInput( $input, CompanyInterface::getDefaults(), $prefix );

        $results[ 'corporate_address_id' ] = $address->id;
        $results[ 'billing_address_id' ] = $address->id;
        $results[ 'representative_id' ] = $representative->id;

        return $results;
    }

}