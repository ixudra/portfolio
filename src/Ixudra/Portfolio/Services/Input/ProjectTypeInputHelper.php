<?php namespace Ixudra\Portfolio\Services\Input;


use Ixudra\Core\Services\Input\BaseInputHelper;
use Ixudra\Portfolio\Interfaces\Services\Input\ProjectTypeInputHelperInterface;
use Ixudra\Portfolio\Interfaces\Models\ProjectTypeInterface;

class ProjectTypeInputHelper extends BaseInputHelper implements ProjectTypeInputHelperInterface {

    public function getDefaultInput($prefix = '')
    {
        return ProjectTypeInterface::getDefaults();
    }

}