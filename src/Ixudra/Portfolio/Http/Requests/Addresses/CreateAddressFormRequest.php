<?php namespace Ixudra\Portfolio\Http\Requests\Addresses;


use Ixudra\Core\Http\Requests\BaseRequest;
use Ixudra\Portfolio\Interfaces\Http\Requests\Addresses\CreateAddressFormRequestInterface;

use App;

class CreateAddressFormRequest extends BaseRequest implements CreateAddressFormRequestInterface {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return App::make('\Ixudra\Portfolio\Interfaces\Services\Validation\AddressValidationHelperInterface')
            ->getFormValidationRules( 'create' );
    }

}
