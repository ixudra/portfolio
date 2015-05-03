<?php namespace Ixudra\Portfolio\Interfaces\Http\Requests\Companies;


interface FilterCompanyFormRequestInterface {

    public function authorize();

    public function rules();

}
