<?php namespace Ixudra\Portfolio\Http\Requests\Addresses;


use Ixudra\Core\Http\Requests\BaseRequest;
use Ixudra\Portfolio\Interfaces\Services\Validation\AddressValidationHelperInterface;

use App;

class UpdateAddressFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return App::make( AddressValidationHelperInterface::class )
            ->getFormValidationRules( 'update' );
    }

}
