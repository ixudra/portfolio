<?php namespace Ixudra\Portfolio\Http\Requests\Customers;


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

    protected function getRedirectUrl()
    {
        $url = parent::getRedirectUrl();

        return $url .'#tab_'. $this->input('customerType');
    }

}
