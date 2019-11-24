<?php namespace Ixudra\Portfolio\Http\Requests\Customers;


use Ixudra\Core\Http\Requests\BaseRequest;
use Ixudra\Portfolio\Interfaces\Services\Validation\CustomerValidationHelperInterface;

use App;

class FilterCustomerFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return App::make( CustomerValidationHelperInterface::class )
            ->getFilterValidationRules();
    }

}
