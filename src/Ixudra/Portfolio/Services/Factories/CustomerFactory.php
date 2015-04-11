<?php namespace Ixudra\Portfolio\Services\Factories;


use Ixudra\Portfolio\Models\Customer;
use Ixudra\Portfolio\Models\CustomerModelInterface;

class CustomerFactory {

    public function make(CustomerModelInterface $object)
    {
        return Customer::create( $this->extractCustomerInput( $object ) );
    }

    protected function extractCustomerInput($object)
    {
        return array(
            'customer_id'           => $object->id,
            'customer_type'         => get_class( $object )
        );
    }

}