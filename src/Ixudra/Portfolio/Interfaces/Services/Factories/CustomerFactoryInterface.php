<?php namespace Ixudra\Portfolio\Interfaces\Services\Factories;


use Ixudra\Portfolio\Interfaces\Models\CustomerInterface;

interface CustomerFactoryInterface {

    public function make(CustomerInterface $object);

}