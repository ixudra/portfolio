<?php namespace Ixudra\Portfolio\Services\Input;


use App;

use Ixudra\Core\Services\Input\BaseInputHelper;
use Ixudra\Portfolio\Models\Address;

class AddressInputHelper extends BaseInputHelper {

    public function getDefaultInput($prefix = '')
    {
        return $this->getPrefixedInput( Address::getDefaults(), $prefix );
    }

    public function getInputForSearch($input)
    {
        if( array_key_exists('_token', $input) ) {
            unset( $input[ '_token' ] );
        }

        if( $input[ 'city_id' ] != 0 ) {
            $address = App::make('\Ixudra\Portfolio\Repositories\Eloquent\EloquentAddressRepository')->find( $input[ 'city_id' ] );
            if( !is_null($address) ) {
                $input[ 'city' ] = $address->city;
            }

            unset( $input[ 'city_id' ] );
        }

        return $input;
    }

}