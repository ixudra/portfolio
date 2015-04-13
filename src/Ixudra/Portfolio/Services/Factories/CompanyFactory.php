<?php namespace Ixudra\Portfolio\Services\Factories;


use Ixudra\Core\Services\Factories\BaseFactory;
use Ixudra\Portfolio\Models\Company;
use Ixudra\Portfolio\Models\Address;
use Ixudra\Portfolio\Models\Person;

class CompanyFactory extends BaseFactory {

    protected $addressFactory;

    protected $personFactory;

    protected $customerFactory;


    public function __construct(AddressFactory $addressFactory, PersonFactory $personFactory, CustomerFactory $customerFactory)
    {
        $this->addressFactory = $addressFactory;
        $this->personFactory = $personFactory;
        $this->customerFactory = $customerFactory;
    }


    public function make($input, $prefix = '')
    {
        $address = $this->addressFactory->make( $this->extractCorporateAddressInput($input) );
        $representative = $this->personFactory->make( $this->extractRepresentativeInput($input), '', false );

        $company = Company::create( $this->extractCompanyInput( $address, $representative, $input, $prefix ) );
        $this->customerFactory->make( $company );

        return $company;
    }

    public function modify($company, $input, $prefix = '')
    {
        $this->addressFactory->modify( $company->corporateAddress, $this->extractCorporateAddressInput($input) );
        $this->personFactory->modify( $company->representative, $this->extractRepresentativeInput($input), '', false );

        return $company->update( $this->extractCompanyInput( $company->corporateAddress, $company->representative, $input, $prefix ) );
    }

    protected function extractCorporateAddressInput($input)
    {
        return $this->extractInput( $input, Address::getDefaults(), 'corporate_address' );
    }

    protected function extractRepresentativeInput($input)
    {
        return $this->extractInput( $input, Person::getDefaults(), 'representative' );
    }

    protected function extractCompanyInput($address, $representative, $input, $prefix)
    {
        $results = $this->extractInput( $input, Company::getDefaults(), $prefix );

        $results[ 'corporate_address_id' ] = $address->id;
        $results[ 'billing_address_id' ] = $address->id;
        $results[ 'representative_id' ] = $representative->id;

        return $results;
    }

}