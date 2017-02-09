<?php namespace Ixudra\Portfolio\Presenters;


use Ixudra\Core\Presenters\BasePresenter;
use Ixudra\Portfolio\Interfaces\Presenters\CustomerPresenterInterface as CustomerPresentationInterface;
use Ixudra\Portfolio\Presenters\CustomerPresenterInterface as CustomerInterface;

class PersonPresenter extends BasePresenter implements CustomerPresentationInterface, CustomerInterface {

    public function fullName()
    {
        return $this->first_name .' '. $this->last_name;
    }

    public function segmentIcon()
    {
        return 'user';
    }

}