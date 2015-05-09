<?php namespace Ixudra\Portfolio\Interfaces\Services\Validation;


interface AddressValidationHelperInterface {

    public function getFilterValidationRules();

    public function getFormValidationRules($formName);

}