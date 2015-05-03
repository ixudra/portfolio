<?php namespace Ixudra\Portfolio\Interfaces\Presenters;


use Translate;

interface AddressPresenterInterface {

    public function name();

    public function street();

    public function countryName();

}