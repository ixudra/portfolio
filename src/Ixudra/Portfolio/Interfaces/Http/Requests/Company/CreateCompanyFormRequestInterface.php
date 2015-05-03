<?php namespace Ixudra\Portfolio\Interfaces\Http\Requests\Companies;


use App;

interface CreateCompanyFormRequestInterface {

    public function authorize();

    public function rules();

}
