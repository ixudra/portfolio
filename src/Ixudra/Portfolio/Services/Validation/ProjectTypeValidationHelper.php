<?php namespace Ixudra\Portfolio\Services\Validation;


use Ixudra\Core\Services\Validation\BaseValidationHelper;
use Ixudra\Portfolio\Interfaces\Services\Validation\ProjectTypeValidationHelperInterface;

use Config;

class ProjectTypeValidationHelper extends BaseValidationHelper implements ProjectTypeValidationHelperInterface {

    public function getFilterValidationRules()
    {
        return array(
            // ...
        );
    }

    public function getFormValidationRules($formName)
    {
        $projectTypeClassName = Config::get('bindings.models.projectType');

        return $projectTypeClassName::getRules();
    }

}