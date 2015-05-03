<?php namespace Ixudra\Portfolio\Interfaces\Http\Requests\ProjectTypes;


interface FilterProjectTypeFormRequestInterface {

    public function authorize();

    public function rules();

}
