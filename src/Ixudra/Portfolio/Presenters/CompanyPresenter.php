<?php namespace Ixudra\Portfolio\Presenters;


use Ixudra\Core\Presenters\BasePresenter;

class CompanyPresenter extends BasePresenter implements CustomerPresenterInterface {

    public function fullName()
    {
        return $this->name;
    }

    public function segmentIcon()
    {
        return 'briefcase';
    }

}