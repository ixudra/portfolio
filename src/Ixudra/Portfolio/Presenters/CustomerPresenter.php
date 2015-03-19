<?php namespace Ixudra\Portfolio\Presenters;


use Laracasts\Presenter\Presenter;

class CustomerPresenter extends Presenter {

    public function fullName()
    {
        return $this->first_name .' '. $this->last_name;
    }

}