<?php namespace Ixudra\Portfolio\Interfaces\Services\Form;


interface AddressFormHelperInterface {

    public function getCitiesAsSelectList($includeNull = false);

    public function getCountriesAsSelectList($includeNull = false);

}