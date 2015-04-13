<?php namespace Ixudra\Portfolio\Services\Input;


use Ixudra\Core\Services\Input\BaseInputHelper;

class CustomerInputHelper extends BaseInputHelper {

    protected $companyInputHelper;

    protected $personInputHelper;


    public function __construct(CompanyInputHelper $companyInputHelper, PersonInputHelper $personInputHelper)
    {
        $this->companyInputHelper = $companyInputHelper;
        $this->personInputHelper = $personInputHelper;
    }


    public function getDefaultInput($prefix = '')
    {
        $companyInput = $this->companyInputHelper->getDefaultInput('company');
        $personInput = $this->personInputHelper->getDefaultInput('person');

        return array_merge(
            $companyInput,
            $personInput
        );
    }

}