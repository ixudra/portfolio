<?php namespace Ixudra\Portfolio\Services\Factories;


use Ixudra\Core\Services\Factories\BaseFactory;
use Ixudra\Portfolio\Models\Company;
use Ixudra\Portfolio\Models\Address;
use Ixudra\Portfolio\Models\Person;

class CompanyFactory extends BaseFactory {

    protected $addressFactory;

    protected $personFactory;


    public function __construct(AddressFactory $addressFactory, PersonFactory $personFactory)
    {
        $this->addressFactory = $addressFactory;
        $this->personFactory = $personFactory;
    }


    public function make($input)
    {
        $address = $this->addressFactory->make( $this->extractAddressInput($input, 'corporate_address') );
        $representative = $this->personFactory->make( $this->extractRepresentativeInput($input, 'representative'), false );

        return Company::create( $this->extractCompanyInput( $address, $representative, $input ) );
    }

    public function modify($company, $input)
    {
        $this->addressFactory->modify( $company->corporateAddress, $this->extractAddressInput($input, 'corporate_address') );
        $this->personFactory->modify( $company->representative, $this->extractRepresentativeInput($input, 'representative'), false );

        return $company->update( $this->extractCompanyInput( $company->corporateAddress, $company->representative, $input ) );
    }

    protected function extractAddressInput($input, $prefix)
    {
        return $this->extractInput( $input, Address::getDefaults(), $prefix );
    }

    protected function extractRepresentativeInput($input, $prefix)
    {
        return $this->extractInput( $input, Person::getDefaults(), $prefix );
    }

    protected function extractCompanyInput($address, $representative, $input)
    {
        $results = $this->extractInput( $input, Company::getDefaults() );

        $results[ 'corporate_address_id' ] = $address->id;
        $results[ 'billing_address_id' ] = $address->id;
        $results[ 'representative_id' ] = $representative->id;

        return $results;
    }

}