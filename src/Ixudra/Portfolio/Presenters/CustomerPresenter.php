<?php namespace Ixudra\Portfolio\Presenters;


use Ixudra\Core\Presenters\BasePresenter;

class CustomerPresenter extends BasePresenter {

    public function fullName()
    {
        return $this->first_name .' '. $this->last_name;
    }

}