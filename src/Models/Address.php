<?php namespace Ixudra\Portfolio\Models;


use Ixudra\Addressable\Models\Address as AddressableAddress;
use Ixudra\Portfolio\Interfaces\Models\AddressInterface;
use Ixudra\Portfolio\Presenters\AddressPresenter;

class Address extends AddressableAddress implements AddressInterface {

    protected $presenter = AddressPresenter::class;


}
