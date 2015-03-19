<?php namespace Ixudra\Portfolio\Services\Input;


use Ixudra\Core\Services\Input\BaseInputHelper;
use Ixudra\Portfolio\Models\Project;

class ProjectInputHelper extends BaseInputHelper {

    public function getDefaultInput()
    {
        return Project::getDefaults();
    }

}