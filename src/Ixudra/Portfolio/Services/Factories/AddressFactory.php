<?php namespace Ixudra\Portfolio\Services\Factories;


use Ixudra\Portfolio\Interfaces\Services\Factories\AddressFactoryInterface;
use Ixudra\Portfolio\Interfaces\Models\AddressInterface;

class AddressFactory implements AddressFactoryInterface {

    public function make($input)
    {
        return AddressInterface::create( $input );
    }

    public function modify(AddressInterface $address, $input)
    {
        return $address->update( $input );
    }

}