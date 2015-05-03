<?php namespace Ixudra\Portfolio\Interfaces\Services\Input;


interface CustomerInputHelperInterface {

    public function getDefaultInput($prefix = '');

    public function getInputForModel($model, $prefix = '');

}