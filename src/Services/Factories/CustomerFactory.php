<?php namespace Ixudra\Portfolio\Services\Factories;


use Ixudra\Portfolio\Interfaces\Services\Factories\CustomerFactoryInterface;
use Ixudra\Portfolio\Interfaces\Models\CustomerModelInterface;

use App;

class CustomerFactory implements CustomerFactoryInterface {

    public function make(CustomerModelInterface $object)
    {
        $customer = $this->createModel();
        $customer->fill( $this->extractCustomerInput( $object ) );
        $customer->save();

        return $customer;
    }

    protected function extractCustomerInput($object)
    {
        return array(
            'name'                  => $object->getSortingName(),
            'customer_id'           => $object->id,
            'customer_type'         => get_class( $object )
        );
    }

    protected function createModel()
    {
        return App::make( 'Ixudra\Portfolio\Interfaces\Models\CustomerInterface' );
    }

}