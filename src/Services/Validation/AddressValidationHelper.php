<?php namespace Ixudra\Portfolio\Services\Validation;


use Ixudra\Core\Services\Validation\BaseValidationHelper;
use Ixudra\Portfolio\Interfaces\Services\Validation\AddressValidationHelperInterface;

use Config;

class AddressValidationHelper extends BaseValidationHelper implements AddressValidationHelperInterface {

    public function getFilterValidationRules()
    {
        return array(
            'city_id'           => 'required|integer',
        );
    }

    public function getFormValidationRules($formName, $prefix = '')
    {
        $addressClassName = Config::get('bindings.models.address');

        return $addressClassName::getRules();
    }

}
