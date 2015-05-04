<?php namespace Ixudra\Portfolio\Services\Validation;


use Ixudra\Core\Services\Validation\BaseValidationHelper;
use Ixudra\Portfolio\Interfaces\Services\Validation\ProjectTypeValidationHelperInterface;
use Ixudra\Portfolio\Interfaces\Models\ProjectTypeInterface;

class ProjectTypeValidationHelper extends BaseValidationHelper implements ProjectTypeValidationHelperInterface {

    public function getFilterValidationRules()
    {
        return array(
            // ...
        );
    }

    public function getFormValidationRules($formName)
    {
        return ProjectTypeInterface::getRules();
    }

}