<?php namespace Ixudra\Portfolio\Presenters;


use Ixudra\Core\Presenters\BasePresenter;
use Ixudra\Portfolio\Interfaces\Presenters\AddressPresenterInterface;

use Translate;

class AddressPresenter extends BasePresenter implements AddressPresenterInterface {

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

    public function countryName()
    {
        return Translate::recursive('portfolio::international.countries.'. $this->country);
    }

}