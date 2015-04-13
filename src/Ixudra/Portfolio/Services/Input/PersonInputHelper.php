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
        return array_merge(
            $model->attributesToArray(),
            $this->addressInputHelper->getInputForModel($model->address, 'address')
        );
    }

}