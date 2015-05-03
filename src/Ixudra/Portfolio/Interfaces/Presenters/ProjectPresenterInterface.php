<?php namespace Ixudra\Portfolio\Interfaces\Presenters;


use Translate;

use Ixudra\Core\Presenters\BasePresenter;

interface ProjectPresenterInterface {

    public function isHidden();

    public function hiddenIcon();

    public function projectStatus();

}