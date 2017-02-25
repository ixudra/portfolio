<?php namespace Ixudra\Portfolio\Http\Requests\People;


use Ixudra\Core\Http\Requests\BaseRequest;

use App;

class CreatePersonFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return App::make( 'Ixudra\Portfolio\Interfaces\Services\Validation\PersonValidationHelperInterface' )
            ->getFormValidationRules( 'create' );
    }

}
