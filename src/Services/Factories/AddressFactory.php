<?php namespace Ixudra\Portfolio\Services\Factories;


use Ixudra\Portfolio\Interfaces\Services\Factories\AddressFactoryInterface;
use Ixudra\Portfolio\Interfaces\Models\AddressInterface;

use App;

class AddressFactory implements AddressFactoryInterface {

    public function make($input)
    {
        $address = $this->createModel();
        $address->fill( $input );
        $address->save();

        return $address;
    }

    public function modify(AddressInterface $address, $input)
    {
        return $address->update( $input );
    }

    protected function createModel()
    {
        return App::make( AddressInterface::class );
    }

}
