<?php namespace Ixudra\Portfolio\Interfaces\Http\Requests\People;


interface FilterPersonFormRequestInterface {

    public function authorize();

    public function rules();

}
