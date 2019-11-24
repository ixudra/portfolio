<?php namespace Ixudra\Portfolio\Http\Requests\People;


use Ixudra\Core\Http\Requests\BaseRequest;
use Ixudra\Portfolio\Interfaces\Services\Validation\PersonValidationHelperInterface;

use App;

class UpdatePersonFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return App::make( PersonValidationHelperInterface::class )
            ->getFormValidationRules( 'update' );
    }

}
