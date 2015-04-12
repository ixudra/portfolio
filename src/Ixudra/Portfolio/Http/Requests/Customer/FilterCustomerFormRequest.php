<?php namespace Ixudra\Portfolio\Http\Requests\Customer;


use Ixudra\Core\Http\Requests\BaseRequest;

class FilterCustomerFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return array(
            'query'             => '',
            'withProject'       => 'boolean'
        );
    }

}
