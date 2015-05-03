<?php namespace Ixudra\Portfolio\Interfaces\Http\Requests\Projects;


interface UpdateProjectFormRequestInterface {

    public function authorize();

    public function rules();

    public function getInput($includeFiles = false);

}
