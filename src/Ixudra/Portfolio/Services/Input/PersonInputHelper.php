<?php namespace Ixudra\Portfolio\Services\Input;


use Ixudra\Core\Services\Input\BaseInputHelper;
use Ixudra\Portfolio\Models\Person;
use Ixudra\Portfolio\Models\Address;

class PersonInputHelper extends BaseInputHelper {

    protected $addressInputHelper;


    public function __construct(AddressInputHelper $addressInputHelper)
    {
        $this->addressInputHelper = $addressInputHelper;
    }


    public function getDefaultInput($prefix = '')
    {
        return array_merge(
            $this->getPrefixedInput( Person::getDefaults(), $prefix ),
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