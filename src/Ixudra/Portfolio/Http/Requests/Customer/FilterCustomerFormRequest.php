<?php namespace Ixudra\Portfolio\Http\Requests\Customer;


use Ixudra\Core\Http\Requests\BaseRequest;

use App;

class FilterCustomerFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return App::make('\Ixudra\Portfolio\Services\Validation\CustomerValidationHelper')
            ->getFilterValidationRules();
    }

}
