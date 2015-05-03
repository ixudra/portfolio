<?php namespace Ixudra\Portfolio\Interfaces\Http\Requests\Address;


use App;

interface UpdateAddressFormRequestInterface {

    public function authorize();

    public function rules();

}
