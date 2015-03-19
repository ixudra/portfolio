<?php namespace Ixudra\Portfolio\Services\Input;


use Ixudra\Core\Services\Input\BaseInputHelper;
use Ixudra\Portfolio\Models\ProjectType;

class ProjectTypeInputHelper extends BaseInputHelper {

    public function getDefaultInput()
    {
        return ProjectType::getDefaults();
    }

}