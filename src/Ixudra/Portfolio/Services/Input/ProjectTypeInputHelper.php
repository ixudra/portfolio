<?php namespace Ixudra\Portfolio\Services\Input;


use Ixudra\Core\Services\Input\BaseInputHelper;
use Ixudra\Portfolio\Interfaces\Services\Input\ProjectTypeInputHelperInterface;

use Config;

class ProjectTypeInputHelper extends BaseInputHelper implements ProjectTypeInputHelperInterface {

    public function getDefaultInput($prefix = '')
    {
        $projectTypeClassName = Config::get('bindings.models.projectType');

        return $projectTypeClassName::getDefaults();
    }

}