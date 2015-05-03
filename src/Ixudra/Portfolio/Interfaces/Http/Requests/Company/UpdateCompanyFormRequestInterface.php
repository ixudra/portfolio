<?php namespace Ixudra\Portfolio\Interfaces\Http\Requests\Companies;


use App;

interface UpdateCompanyFormRequestInterface {

    public function authorize();

    public function rules();

}
