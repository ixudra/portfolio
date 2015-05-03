<?php namespace Ixudra\Portfolio\Interfaces\Http\Requests\Address;


use App;

interface CreateAddressFormRequestInterface {

    public function authorize();

    public function rules();

}
