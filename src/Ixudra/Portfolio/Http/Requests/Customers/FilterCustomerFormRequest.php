<?php namespace Ixudra\Portfolio\Http\Requests\Customers;


use Ixudra\Core\Http\Requests\BaseRequest;
use Ixudra\Portfolio\Interfaces\Http\Requests\Customers\FilterCustomerFormRequestInterface;

use App;

class FilterCustomerFormRequest extends BaseRequest implements FilterCustomerFormRequestInterface {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return App::make('\Ixudra\Portfolio\Interfaces\Services\Validation\CustomerValidationHelperInterface')
            ->getFilterValidationRules();
    }

}
