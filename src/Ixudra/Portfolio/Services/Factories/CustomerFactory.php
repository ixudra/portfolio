<?php namespace Ixudra\Portfolio\Services\Factories;


use Ixudra\Portfolio\Interfaces\Services\Factories\CustomerFactoryInterface;
use Ixudra\Portfolio\Interfaces\Models\CustomerInterface;

class CustomerFactory implements CustomerFactoryInterface {

    public function make(CustomerInterface $object)
    {
        return CustomerInterface::create( $this->extractCustomerInput( $object ) );
    }

    protected function extractCustomerInput($object)
    {
        return array(
            'name'                  => $object->getSortingName(),
            'customer_id'           => $object->id,
            'customer_type'         => get_class( $object )
        );
    }

}