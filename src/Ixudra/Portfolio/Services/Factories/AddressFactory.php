<?php namespace Ixudra\Portfolio\Services\Factories;


use Ixudra\Portfolio\Models\Address;

class AddressFactory {

    public function make($input)
    {
        return Address::create( $input );
    }

    public function modify($address, $input)
    {
        return $address->update( $input );
    }

}