<?php namespace Ixudra\Portfolio\Interfaces\Http\Requests\Projects;


interface CreateProjectFormRequestInterface {

    public function authorize();

    public function rules();

    public function getInput($includeFiles = false);

}
