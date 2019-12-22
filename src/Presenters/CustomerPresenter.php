<?php namespace Ixudra\Portfolio\Presenters;


use Ixudra\Core\Presenters\BasePresenter;
use Ixudra\Portfolio\Interfaces\Presenters\CustomerPresenterInterface;

class CustomerPresenter extends BasePresenter implements CustomerPresenterInterface {

    public function fullName()
    {
        return $this->entity->customer->present()->fullName;
    }

}
