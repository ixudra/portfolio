<?php namespace Ixudra\Portfolio\Http\Requests\Addresses;


use Ixudra\Core\Http\Requests\BaseRequest;

use App;

class FilterAddressFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return App::make( 'Ixudra\Portfolio\Interfaces\Services\Validation\AddressValidationHelperInterface' )
            ->getFilterValidationRules();
    }

}
