<?php namespace Ixudra\Portfolio\Services\Input;


use Ixudra\Core\Services\Input\BaseInputHelper;
use Ixudra\Portfolio\Interfaces\Services\Input\AddressInputHelperInterface;
use Ixudra\Portfolio\Interfaces\Services\Input\PersonInputHelperInterface;

use Config;

class PersonInputHelper extends BaseInputHelper implements PersonInputHelperInterface {

    protected $addressInputHelper;


    public function __construct(AddressInputHelperInterface $addressInputHelper)
    {
        $this->addressInputHelper = $addressInputHelper;
    }


    public function getDefaultInput($prefix = '')
    {
        $personClassName = Config::get('bindings.models.person');

        return array_merge(
            $this->getPrefixedInput( $personClassName::getDefaults(), $prefix ),
            $this->addressInputHelper->getDefaultInput( 'address' )
        );
    }

    public function getInputForModel($model, $prefix = '')
    {
        if( is_null($model->address) ) {
            $addressInput = $this->addressInputHelper->getDefaultInput( 'address' );
        } else {
            $addressInput = $this->addressInputHelper->getInputForModel( $model->address, 'address' );
        }

        return array_merge(
            $this->getPrefixedInput( $model->attributesToArray(), $prefix ),
            $addressInput
        );
    }

}