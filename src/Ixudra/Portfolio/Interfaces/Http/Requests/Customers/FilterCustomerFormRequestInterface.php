<?php namespace Ixudra\Portfolio\Interfaces\Http\Requests\Customers;


interface FilterCustomerFormRequestInterface {

    public function authorize();

    public function rules();

}
