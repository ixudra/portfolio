<?php namespace Ixudra\Portfolio\Interfaces\Http\Requests\Companies;


interface CreateCompanyFormRequestInterface {

    public function authorize();

    public function rules();

}
