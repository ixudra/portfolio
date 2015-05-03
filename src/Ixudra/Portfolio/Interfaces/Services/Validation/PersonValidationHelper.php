<?php namespace Ixudra\Portfolio\Interfaces\Services\Validation;


interface PersonValidationHelperInterface {

    public function getFilterValidationRules();

    public function getFormValidationRules($formName);

}