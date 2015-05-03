<?php namespace Ixudra\Portfolio\Interfaces\Http\Requests\Addresses;


use App;

interface FilterAddressFormRequestInterface {

    public function authorize();

    public function rules();

}
