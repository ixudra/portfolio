<?php namespace Ixudra\Portfolio\Services\Input;


use Ixudra\Core\Services\Input\BaseInputHelper;
use Ixudra\Portfolio\Models\Company;
use Ixudra\Portfolio\Models\Address;
use Ixudra\Portfolio\Models\Person;

class CompanyInputHelper extends BaseInputHelper {

    protected $addressInputHelper;

    protected $personInputHelper;


    public function __construct(AddressInputHelper $addressInputHelper, PersonInputHelper $personInputHelper)
    {
        $this->addressInputHelper = $addressInputHelper;
        $this->personInputHelper = $personInputHelper;
    }


    public function getDefaultInput($prefix = '')
    {
        $input = array_merge(
            $this->getPrefixedInput( Company::getDefaults(), $prefix ),
            $this->addressInputHelper->getDefaultInput( 'corporate_address' ),
            $this->addressInputHelper->getDefaultInput( 'billing_address' ),
            $this->getPrefixedInput( Person::getDefaults(), 'representative' )
        );

        return $input;
    }

    public function getInputForModel($model, $prefix = '')
    {
        return array_merge(
            $this->getPrefixedInput( $model->attributesToArray(), $prefix ),
            $this->addressInputHelper->getInputForModel( $model->corporateAddress, 'corporate_address' ),
            $this->getPrefixedInput( $model->representative->attributesToArray(), 'representative' )
        );
    }

}