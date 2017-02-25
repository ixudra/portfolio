<?php namespace Ixudra\Portfolio\Services\Input;


use Ixudra\Core\Services\Input\BaseInputHelper;
use Ixudra\Portfolio\Interfaces\Services\Input\AddressInputHelperInterface;

use App;
use Config;

class AddressInputHelper extends BaseInputHelper implements AddressInputHelperInterface {

    public function getDefaultInput($prefix = '')
    {
        $addressClassName = Config::get('bindings.models.address');

        return $this->getPrefixedInput( $addressClassName::getDefaults(), $prefix );
    }

    public function getInputForSearch($input)
    {
        if( array_key_exists('_token', $input) ) {
            unset( $input[ '_token' ] );
        }

        if( $input[ 'city_id' ] != 0 ) {
            $address = App::make( 'Ixudra\Portfolio\Interfaces\Repositories\AddressRepositoryInterface' )->find( $input[ 'city_id' ] );
            if( !is_null($address) ) {
                $input[ 'city' ] = $address->city;
            }

            unset( $input[ 'city_id' ] );
        }

        return $input;
    }

}