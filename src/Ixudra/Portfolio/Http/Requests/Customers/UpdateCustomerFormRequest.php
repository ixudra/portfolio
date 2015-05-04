<?php namespace Ixudra\Portfolio\Http\Requests\Customers;


use Ixudra\Core\Http\Requests\BaseRequest;
use Ixudra\Portfolio\Interfaces\Http\Requests\Customers\UpdateCustomerFormRequestInterface;

use App;

class UpdateCustomerFormRequest extends BaseRequest implements UpdateCustomerFormRequestInterface {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return App::make('\Ixudra\Portfolio\Interfaces\Services\Validation\CustomerValidationHelperInterface', array( $this->input('customerType') ))
            ->getFormValidationRules( 'update' );
    }

}
