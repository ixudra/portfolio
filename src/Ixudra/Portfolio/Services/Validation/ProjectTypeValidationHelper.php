<?php namespace Ixudra\Portfolio\Services\Validation;


use Ixudra\Core\Services\Validation\BaseValidationHelper;
use Ixudra\Portfolio\Models\ProjectType;

class ProjectTypeValidationHelper extends BaseValidationHelper {

    public function getFilterValidationRules()
    {
        return array(
            // ...
        );
    }

    public function getFormValidationRules($formName)
    {
        return ProjectType::getRules();
    }

}