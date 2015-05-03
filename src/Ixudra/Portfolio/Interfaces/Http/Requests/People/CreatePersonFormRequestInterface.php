<?php namespace Ixudra\Portfolio\Interfaces\Http\Requests\People;


interface CreatePersonFormRequestInterface {

    public function authorize();

    public function rules();

}
