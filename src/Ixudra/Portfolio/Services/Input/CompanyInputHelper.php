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


    public function getDefaultInput()
    {
        return array_merge(
            Company::getDefaults(),
            Address::getDefaults(),
            Person::getDefaults()
        );
    }

    public function getInputForModel($model)
    {
        return array_merge(
            $model->attributesToArray(),
            $this->addressInputHelper->getInputForModel( $model->corporateAddress ),
            $model->representative->attributesToArray()
        );
    }

}