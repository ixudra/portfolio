<?php namespace Ixudra\Portfolio\Services\Validation;


use Ixudra\Core\Services\Validation\BaseValidationHelper;
use Ixudra\Portfolio\Interfaces\Services\Validation\CompanyValidationHelperInterface;

use Config;

class CompanyValidationHelper extends BaseValidationHelper implements CompanyValidationHelperInterface {

    public function getFilterValidationRules()
    {
        return array(
            'query'             => 'required',
        );
    }

    public function getFormValidationRules($formName, $prefix = '')
    {
        $companyClassName = Config::get('bindings.models.company');
        $addressClassName = Config::get('bindings.models.address');
        $personClassName = Config::get('bindings.models.person');

        return array_merge(
            $this->getPrefixedRules( $companyClassName::getRules(), 'company' ),
            $this->getPrefixedRules( $addressClassName::getRules(), 'corporate_address' ),
            $this->getPrefixedRules( $addressClassName::getRules(), 'billing_address', true ),
            $this->getPrefixedRules( $personClassName::getRules(), 'representative' )
        );
    }

}
