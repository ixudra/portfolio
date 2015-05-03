<?php namespace Ixudra\Portfolio\Interfaces\Http\Requests\Address;


use App;

interface FilterAddressFormRequestInterface {

    public function authorize();

    public function rules();

}
