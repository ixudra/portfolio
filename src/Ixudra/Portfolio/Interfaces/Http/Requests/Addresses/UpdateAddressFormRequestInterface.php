<?php namespace Ixudra\Portfolio\Interfaces\Http\Requests\Addresses;


use App;

interface UpdateAddressFormRequestInterface {

    public function authorize();

    public function rules();

}
