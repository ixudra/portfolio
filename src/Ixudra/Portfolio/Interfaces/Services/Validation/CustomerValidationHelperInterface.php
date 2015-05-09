<?php namespace Ixudra\Portfolio\Interfaces\Services\Validation;


interface CustomerValidationHelperInterface {

    public function getFilterValidationRules();

    public function getFormValidationRules($formName);

    public function getRequiredFormFields($formName);

}