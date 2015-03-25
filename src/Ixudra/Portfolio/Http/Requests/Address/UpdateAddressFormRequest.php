<?php namespace Ixudra\Portfolio\Http\Requests\Address;


use Ixudra\Core\Http\Requests\BaseRequest;
use Ixudra\Portfolio\Models\Address;

class UpdateAddressFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Address::getRules();
    }

}
