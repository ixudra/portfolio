<?php namespace Ixudra\Portfolio\Services\Factories;


use Ixudra\Core\Services\Factories\BaseFactory;
use Ixudra\Portfolio\Interfaces\Services\Factories\AddressFactoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Factories\CustomerFactoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Factories\PersonFactoryInterface;
use Ixudra\Portfolio\Interfaces\Models\PersonInterface;

use App;
use Config;

class PersonFactory extends BaseFactory implements PersonFactoryInterface {

    protected $addressFactory;

    protected $customerFactory;


    public function __construct(AddressFactoryInterface $addressFactory, CustomerFactoryInterface $customerFactory)
    {
        $this->addressFactory = $addressFactory;
        $this->customerFactory = $customerFactory;
    }


    public function make($input, $prefix = '')
    {
        $address = null;
        if( $this->includeAddress($input) ) {
            $address = $this->addressFactory->make( $this->extractAddressInput( $input, 'address' ) );
        }

        $person = $this->createModel( $this->extractPersonInput($address, $input, $prefix) );
        $person->save();

        $this->customerFactory->make( $person );

        return $person;
    }

    public function modify(PersonInterface $person, $input, $prefix = '')
    {
        $address = $person->address;
        if( $this->includeAddress($input) ) {
            if( is_null($address) ) {
                $address = $this->addressFactory->make( $this->extractAddressInput( $input, 'address' ) );
            } else {
                $this->addressFactory->modify( $address, $this->extractAddressInput( $input, 'address' ) );
            }
        } else {
            if( !is_null($address) ) {
                $address->delete();
                $address = null;
            }
        }

        return $person->update( $this->extractPersonInput($address, $input, $prefix) );
    }

    protected function includeAddress($input)
    {
        return array_key_exists('address_street_1', $input) && $input[ 'address_street_1' ] != '';
    }

    protected function extractAddressInput($input, $prefix = '')
    {
        $addressClassName = Config::get('bindings.models.address');

        return $this->extractInput( $input, $addressClassName::getDefaults(), $prefix );
    }

    protected function extractPersonInput($address, $input, $prefix)
    {
        $personClassName = Config::get('bindings.models.person');

        $results = $this->extractInput( $input, $personClassName::getDefaults(), $prefix );

        $addressId = 0;
        if( !is_null($address) ) {
            $addressId = $address->id;
        }

        $results[ 'address_id' ] = $addressId;

        return $results;
    }

    protected function createModel($input = array())
    {
        return App::make( 'Ixudra\Portfolio\Interfaces\Models\PersonInterface', array($input) );
    }

}