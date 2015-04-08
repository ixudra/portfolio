<?php namespace Ixudra\Portfolio\Http\Requests\Companies;


use Ixudra\Core\Http\Requests\BaseRequest;
use Ixudra\Portfolio\Models\Company;
use Ixudra\Portfolio\Models\Address;
use Ixudra\Portfolio\Models\Person;

class UpdateCompanyFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return array_merge(
            Company::getRules(),
            Address::getRules(),
            Person::getRules()
        );
    }

}
