<?php namespace Ixudra\Portfolio\Http\Requests\Customer;


use Ixudra\Core\Http\Requests\BaseRequest;

use App;

class CreateCustomerFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return App::make('\Ixudra\Portfolio\Services\Validation\CustomerValidationHelper', array( $this->input('customerType') ))
            ->getFormValidationRules( 'create' );
    }

}
