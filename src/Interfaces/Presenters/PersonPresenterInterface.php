<?php namespace Ixudra\Portfolio\Interfaces\Presenters;


interface PersonPresenterInterface extends CustomerPresenterInterface {

    public function fullName();

    public function segmentIcon();

}