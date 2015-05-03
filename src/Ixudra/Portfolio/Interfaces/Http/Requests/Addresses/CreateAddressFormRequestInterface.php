<?php namespace Ixudra\Portfolio\Interfaces\Http\Requests\Addresses;


use App;

interface CreateAddressFormRequestInterface {

    public function authorize();

    public function rules();

}
