<?php namespace Ixudra\Portfolio\Http\Requests\Addresses;


use Ixudra\Core\Http\Requests\BaseRequest;
use Ixudra\Portfolio\Interfaces\Http\Requests\Addresses\FilterAddressFormRequestInterface;

use App;

class FilterAddressFormRequest extends BaseRequest implements FilterAddressFormRequestInterface {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return App::make('\Ixudra\Portfolio\Interface\Services\Validation\AddressValidationHelperInterface')
            ->getFilterValidationRules();
    }

}
