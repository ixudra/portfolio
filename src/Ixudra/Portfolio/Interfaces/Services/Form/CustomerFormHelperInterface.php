<?php namespace Ixudra\Portfolio\Interfaces\Services\Form;


interface CustomerFormHelperInterface {

    public function getUsedAsSelectList($includeNull = false);

    public function getWithProjectOptionsAsSelectList($includeNull = false);

}
