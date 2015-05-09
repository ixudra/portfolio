<?php namespace Ixudra\Portfolio\Interfaces\Services\Validation;


interface ProjectValidationHelperInterface {

    public function getFilterValidationRules();

    public function getFormValidationRules($formName);

}