<?php namespace Ixudra\Portfolio\Interfaces\Services\Validation;


interface CompanyValidationHelperInterface {

    public function getFilterValidationRules();

    public function getFormValidationRules($formName);

}