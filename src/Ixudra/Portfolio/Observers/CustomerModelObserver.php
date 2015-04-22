<?php namespace Ixudra\Portfolio\Observers;


class CustomerModelObserver {

    public function updated($model)
    {
        $model->customer->name = $model->getSortingName();
        $model->customer->save();
    }

}