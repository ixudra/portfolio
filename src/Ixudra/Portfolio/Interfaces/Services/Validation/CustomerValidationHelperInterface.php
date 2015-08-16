<?php namespace Ixudra\Portfolio\Interfaces\Services\Validation;


interface CustomerValidationHelperInterface {

    public function getFilterValidationRules();

    public function getFormValidationRules($formName, $prefix = '');

    public function getRequiredFormFields($formName, $prefix = '');

}