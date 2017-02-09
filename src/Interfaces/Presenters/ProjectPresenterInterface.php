<?php namespace Ixudra\Portfolio\Interfaces\Presenters;


interface ProjectPresenterInterface {

    public function isHidden();

    public function hiddenIcon();

    public function projectStatus();

}