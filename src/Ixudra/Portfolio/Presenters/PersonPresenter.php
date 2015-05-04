<?php namespace Ixudra\Portfolio\Presenters;


use Ixudra\Core\Presenters\BasePresenter;
use Ixudra\Portfolio\Interfaces\Presenters\CustomerPresenterInterface;
use Ixudra\Portfolio\Presenters\CustomerPresenterInterface as CustomerInterface;

class PersonPresenter extends BasePresenter implements CustomerPresenterInterface, CustomerInterface {

    public function fullName()
    {
        return $this->first_name .' '. $this->last_name;
    }

    public function segmentIcon()
    {
        return 'user';
    }

}