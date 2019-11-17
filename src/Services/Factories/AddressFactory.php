<?php namespace Ixudra\Portfolio\Services\Factories;


use Ixudra\Core\Services\Factories\BaseFactory;
use Ixudra\Portfolio\Interfaces\Services\Factories\AddressFactoryInterface;
use Ixudra\Portfolio\Interfaces\Models\AddressInterface;

use App;
use Config;

class AddressFactory extends BaseFactory implements AddressFactoryInterface {

    public function make($input, $reference, $prefix = '')
    {
        $addressClassName = Config::get('bindings.models.address');

        $data = $this->extractInput( $input, $addressClassName::getDefaults(), $prefix, true );
        $data[ 'reference_id' ] = $reference->id;
        $data[ 'reference_type' ] = get_class($reference);

        $address = $this->createModel();
        $address->fill( $data );
        $address->save();

        return $address;
    }

    public function modify(AddressInterface $address, $input, $prefix = '')
    {
        $addressClassName = Config::get('bindings.models.company');

        $address->update( $this->extractInput( $input, $addressClassName::getDefaults(), $prefix ) );

        return $address;
    }

    protected function createModel()
    {
        return App::make( AddressInterface::class );
    }

}
