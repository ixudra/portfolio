<?php namespace Ixudra\Portfolio\Http\Requests\People;


use Ixudra\Core\Http\Requests\BaseRequest;
use Ixudra\Portfolio\Models\Person;
use Ixudra\Portfolio\Models\Address;

class CreatePersonFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return array_merge(
            Person::getRules(),
            Address::getRules()
        );
    }

}
