<?php namespace Ixudra\Portfolio\Services\Factories;


use Ixudra\Core\Services\Factories\BaseFactory;
use Ixudra\Portfolio\Models\Person;
use Ixudra\Portfolio\Models\Address;

class PersonFactory extends BaseFactory {

    protected $addressFactory;

    protected $customerFactory;


    public function __construct(AddressFactory $addressFactory, CustomerFactory $customerFactory)
    {
        $this->addressFactory = $addressFactory;
        $this->customerFactory = $customerFactory;
    }


    public function make($input, $prefix = '', $includeAddress = true)
    {
        $address = null;
        if( $includeAddress ) {
            $address = $this->addressFactory->make( $this->extractAddressInput( $input, 'address' ) );
        }

        $person = Person::create( $this->extractPersonInput($address, $input, $prefix) );
        $this->customerFactory->make( $person );

        return $person;
    }

    public function modify($person, $input, $prefix = '', $includeAddress = false)
    {
        if( $includeAddress ) {
            $this->addressFactory->modify( $person->address, $this->extractAddressInput( $input, 'address' ) );
        }

        return $person->update( $this->extractPersonInput($person->address, $input, $prefix) );
    }

    protected function extractAddressInput($input, $prefix = '')
    {
        return $this->extractInput( $input, Address::getDefaults(), $prefix );
    }

    protected function extractPersonInput($address, $input, $prefix)
    {
        $results = $this->extractInput( $input, Person::getDefaults(), $prefix );

        $addressId = 0;
        if( !is_null($address) ) {
            $addressId = $address->id;
        }

        $results[ 'address_id' ] = $addressId;

        return $results;
    }

}