<?php namespace Ixudra\Portfolio\Services\Validation;


use Ixudra\Core\Services\Validation\BaseValidationHelper;
use Ixudra\Portfolio\Models\Company;
use Ixudra\Portfolio\Models\Address;
use Ixudra\Portfolio\Models\Person;

class CompanyValidationHelper extends BaseValidationHelper {

    public function getFilterValidationRules()
    {
        return array(
            'query'             => 'required'
        );
    }

    public function getFormValidationRules($formName)
    {
        return array_merge(
            $this->getPrefixedRules( Company::getRules(), 'company' ),
            $this->getPrefixedRules( Address::getRules(), 'corporate_address' ),
            $this->getPrefixedRules( Address::getRules(), 'billing_address', true ),
            $this->getPrefixedRules( Person::getRules(), 'representative' )
        );
    }

}