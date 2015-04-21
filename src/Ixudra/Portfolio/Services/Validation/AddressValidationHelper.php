<?php namespace Ixudra\Portfolio\Services\Validation;


use Ixudra\Core\Services\Validation\BaseValidationHelper;
use Ixudra\Portfolio\Models\Address;
use Ixudra\Imageable\Models\Image;

class AddressValidationHelper extends BaseValidationHelper {

    public function getFilterValidationRules()
    {
        return array(
            'city_id'           => 'required|integer'
        );
    }

    public function getFormValidationRules($formName)
    {
        return Address::getRules();
    }

}