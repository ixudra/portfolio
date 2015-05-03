<?php namespace Ixudra\Portfolio\Interfaces\Services\Validation;


interface ProjectTypeValidationHelperInterface {

    public function getFilterValidationRules();

    public function getFormValidationRules($formName);

}