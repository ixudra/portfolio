<?php namespace Ixudra\Portfolio\Interfaces\Http\Requests\Customers;


interface CreateCustomerFormRequestInterface {

    public function authorize();

    public function rules();

}
