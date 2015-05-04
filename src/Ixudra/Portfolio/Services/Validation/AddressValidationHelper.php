<?php namespace Ixudra\Portfolio\Services\Validation;


use Ixudra\Core\Services\Validation\BaseValidationHelper;
use Ixudra\Portfolio\Interfaces\Services\Validation\AddressValidationHelperInterface;
use Ixudra\Portfolio\Interfaces\Models\AddressInterface;

class AddressValidationHelper extends BaseValidationHelper implements AddressValidationHelperInterface {

    public function getFilterValidationRules()
    {
        return array(
            'city_id'           => 'required|integer'
        );
    }

    public function getFormValidationRules($formName)
    {
        return AddressInterface::getRules();
    }

}