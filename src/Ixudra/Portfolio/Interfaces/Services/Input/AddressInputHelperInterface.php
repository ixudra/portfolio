<?php namespace Ixudra\Portfolio\Interfaces\Services\Input;


interface AddressInputHelperInterface {

    public function getDefaultInput($prefix = '');

    public function getInputForSearch($input);

}