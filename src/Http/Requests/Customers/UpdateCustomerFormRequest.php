<?php namespace Ixudra\Portfolio\Http\Requests\Customers;


use Ixudra\Core\Http\Requests\BaseRequest;

use App;

class UpdateCustomerFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return App::make( 'Ixudra\Portfolio\Interfaces\Services\Validation\CustomerValidationHelperInterface', array( $this->input('customerType') ) )
            ->getFormValidationRules( 'update' );
    }

}
