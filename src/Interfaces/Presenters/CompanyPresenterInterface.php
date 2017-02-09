<?php namespace Ixudra\Portfolio\Interfaces\Presenters;


interface CompanyPresenterInterface extends CustomerPresenterInterface {

    public function fullName();

    public function segmentIcon();

}