<?php namespace Ixudra\Portfolio\Interfaces\Http\Requests\Projects;


interface FilterProjectFormRequestInterface {

    public function authorize();

    public function rules();

}
