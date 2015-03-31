<?php namespace Ixudra\Portfolio\Http\Requests\Companies;


use Ixudra\Core\Http\Requests\BaseRequest;

class FilterCompanyFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return array(
            'query'         => 'required'
        );
    }

}
