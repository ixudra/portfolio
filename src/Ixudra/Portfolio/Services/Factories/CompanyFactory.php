<?php namespace Ixudra\Portfolio\Services\Factories;


use Ixudra\Portfolio\Models\Company;
use Ixudra\Portfolio\Models\Address;

class CompanyFactory {

    protected $addressFactory;


    public function __construct(AddressFactory $addressFactory)
    {
        $this->addressFactory = $addressFactory;
    }


    public function make($input)
    {
        $address = $this->addressFactory->make( $this->extractAddressInput( $input ) );

        return Company::create( $this->extractCompanyInput( $address, $input ) );
    }

    public function modify($company, $input)
    {
        $this->addressFactory->modify( $company->corporateAddress, $this->extractAddressInput( $input ) );

        return $company->update( $this->extractCompanyInput( $company->corporateAddress, $input ) );
    }

    protected function extractAddressInput($input)
    {
        $results = Address::getDefaults();
        foreach( $results as $key => $value ) {
            $results[ $key ] = $input [ $key ];
        }

        return $results;
    }

    protected function extractCompanyInput($address, $input)
    {
        $results = Company::getDefaults();
        foreach( $results as $key => $value ) {
            $results[ $key ] = $input [ $key ];
        }

        $results[ 'corporate_address_id' ] = $address->id;
        $results[ 'billing_address_id' ] = $address->id;

        return $results;
    }

}