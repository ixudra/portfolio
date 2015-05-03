<?php namespace Ixudra\Portfolio\Interfaces\Services\Input;


interface ProjectInputHelperInterface {

    public function getInputForModel($model, $prefix = '');

    public function getDefaultInput($prefix = '');

    public function getInputForSearch($input);

}