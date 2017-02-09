<?php namespace Ixudra\Portfolio\Interfaces\Services\Form;


interface ProjectFormHelperInterface {

    public function getStatusesAsSelectList($includeNull = false);

    public function getVisibilityOptionsAsSelectList($includeNull = false);

}