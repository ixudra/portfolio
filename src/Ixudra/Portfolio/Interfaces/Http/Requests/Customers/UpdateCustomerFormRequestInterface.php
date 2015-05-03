<?php namespace Ixudra\Portfolio\Interfaces\Http\Requests\Customers;


interface UpdateCustomerFormRequestInterface {

    public function authorize();

    public function rules();

}
