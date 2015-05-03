<?php namespace Ixudra\Portfolio\Interfaces\Http\Requests\Companies;


use App;

interface FilterCompanyFormRequestInterface {

    public function authorize();

    public function rules();

}
