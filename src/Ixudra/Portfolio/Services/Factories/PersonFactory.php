<?php namespace Ixudra\Portfolio\Services\Factories;


use Ixudra\Core\Services\Factories\BaseFactory;
use Ixudra\Portfolio\Models\Person;
use Ixudra\Portfolio\Models\Address;

class PersonFactory extends BaseFactory {

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
        return $this->extractInput( $input, Address::getDefaults() );
    }

    protected function extractPersonInput($address, $input)
    {
        $results = $this->extractInput( $input, Person::getDefaults() );

        $addressId = 0;
        if( !is_null($address) ) {
            $addressId = $address->id;
        }

        $results[ 'address_id' ] = $addressId;

        return $results;
    }

}