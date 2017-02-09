<?php namespace Ixudra\Portfolio\Interfaces\Services\Factories;


use Ixudra\Portfolio\Interfaces\Models\AddressInterface;

interface AddressFactoryInterface {

    public function make($input);

    public function modify(AddressInterface $address, $input);

}