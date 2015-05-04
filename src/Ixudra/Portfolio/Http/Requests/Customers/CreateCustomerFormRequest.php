<?php namespace Ixudra\Portfolio\Http\Requests\Customers;


use Ixudra\Core\Http\Requests\BaseRequest;
use Ixudra\Portfolio\Interfaces\Http\Requests\Customers\CreateCustomerFormRequestInterface;

use App;

class CreateCustomerFormRequest extends BaseRequest implements CreateCustomerFormRequestInterface {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return App::make('\Ixudra\Portfolio\Interface\Services\Validation\CustomerValidationHelperInterface', array( $this->input('customerType') ))
            ->getFormValidationRules( 'create' );
    }

    protected function getRedirectUrl()
    {
        $url = parent::getRedirectUrl();

        return $url .'#tab_'. $this->input('customerType');
    }

}
