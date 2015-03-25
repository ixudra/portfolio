<?php namespace Ixudra\Portfolio\Presenters;


use Laracasts\Presenter\Presenter;

class AddressPresenter extends Presenter {

    public function name()
    {
        return $this->street() .', '. $this->city .' ('. $this->country .')';
    }

    public function street()
    {
        $box = '';
        if( $box != '' ) {
            $box = ' '. $this->box;
        }

        return $this->street_1 .' '. $this->number . $box;
    }

}