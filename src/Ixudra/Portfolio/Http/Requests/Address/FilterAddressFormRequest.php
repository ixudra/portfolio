<?php namespace Ixudra\Portfolio\Http\Requests\Address;


use Ixudra\Core\Http\Requests\BaseRequest;

class FilterAddressFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return array(
            'city_id'                   => 'required|integer'
        );
    }

}
