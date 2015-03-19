<?php namespace Ixudra\Portfolio\Services\Factories;


use Ixudra\Portfolio\Models\Customer;

class CustomerFactory {

    public function make($input)
    {
        return Customer::create( $input );
    }

    public function modify($customer, $input)
    {
        return $customer->update( $input );
    }

}