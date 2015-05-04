<?php namespace Ixudra\Portfolio\Services\Validation;


use Ixudra\Core\Services\Validation\BaseValidationHelper;
use Ixudra\Portfolio\Interfaces\Services\Validation\CompanyValidationHelperInterface;
use Ixudra\Portfolio\Interfaces\Models\AddressInterface;
use Ixudra\Portfolio\Interfaces\Models\CompanyInterface;
use Ixudra\Portfolio\Interfaces\Models\PersonInterface;

class CompanyValidationHelper extends BaseValidationHelper implements CompanyValidationHelperInterface {

    public function getFilterValidationRules()
    {
        return array(
            'query'             => 'required'
        );
    }

    public function getFormValidationRules($formName)
    {
        return array_merge(
            $this->getPrefixedRules( CompanyInterface::getRules(), 'company' ),
            $this->getPrefixedRules( AddressInterface::getRules(), 'corporate_address' ),
            $this->getPrefixedRules( AddressInterface::getRules(), 'billing_address', true ),
            $this->getPrefixedRules( PersonInterface::getRules(), 'representative' )
        );
    }

}