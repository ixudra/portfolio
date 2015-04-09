<?php namespace Ixudra\Portfolio\Services\Factories;


use Ixudra\Portfolio\Models\Person;
use Ixudra\Portfolio\Models\Address;

class PersonFactory {

    protected $addressFactory;


    public function __construct(AddressFactory $addressFactory)
    {
        $this->addressFactory = $addressFactory;
    }


    public function make($input, $includeAddress = true)
    {
        $address = null;
        if( $includeAddress ) {
            $address = $this->addressFactory->make( $this->extractAddressInput( $input ) );
        }

        return Person::create( $this->extractPersonInput( $address, $input ) );
    }

    public function modify($person, $input, $includeAddress = false)
    {
        if( $includeAddress ) {
            $this->addressFactory->modify( $person->address, $this->extractAddressInput( $input ) );
        }

        return $person->update( $this->extractPersonInput( $person->address, $input ) );
    }

    protected function extractAddressInput($input)
    {
        $results = Address::getDefaults();
        foreach( $results as $key => $value ) {
            $results[ $key ] = $input [ $key ];
        }

        return $results;
    }

    protected function extractPersonInput($address, $input)
    {
        $results = Person::getDefaults();
        foreach( $results as $key => $value ) {
            $results[ $key ] = $input [ $key ];
        }

        $addressId = 0;
        if( !is_null($address) ) {
            $addressId = $address->id;
        }

        $results[ 'address_id' ] = $addressId;

        return $results;
    }

}