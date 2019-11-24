<?php namespace Ixudra\Portfolio\Http\Requests\Customers;


use Ixudra\Core\Http\Requests\BaseRequest;
use Ixudra\Portfolio\Interfaces\Services\Validation\CustomerValidationHelperInterface;

use App;

class UpdateCustomerFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return App::makeWith( CustomerValidationHelperInterface::class, array( $this->input('customerType') ) )
            ->getFormValidationRules( 'update' );
    }

}
