<?php namespace Ixudra\Portfolio\Observers;


use Ixudra\Portfolio\Interfaces\Observers\CustomerModelObserverInterface;

class CustomerModelObserver implements CustomerModelObserverInterface {

    public function updated($model)
    {
        $model->customer->name = $model->getSortingName();
        $model->customer->save();
    }

}