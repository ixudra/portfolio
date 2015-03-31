<?php namespace Ixudra\Portfolio\Http\Requests\Companies;


use Ixudra\Core\Http\Requests\BaseRequest;
use Ixudra\Portfolio\Models\Company;

class UpdateCompanyFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Company::getRules();
    }

}
