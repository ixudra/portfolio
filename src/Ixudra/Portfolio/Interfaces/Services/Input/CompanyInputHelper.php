<?php namespace Ixudra\Portfolio\Interfaces\Services\Input;


interface CompanyInputHelperInterface {

    public function getDefaultInput($prefix = '');

    public function getInputForModel($model, $prefix = '');

}