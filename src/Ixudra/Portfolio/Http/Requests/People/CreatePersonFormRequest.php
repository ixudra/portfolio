<?php namespace Ixudra\Portfolio\Http\Requests\People;


use Ixudra\Core\Http\Requests\BaseRequest;
use Ixudra\Portfolio\Interfaces\Http\Requests\People\CreatePersonFormRequestInterface;

use App;

class CreatePersonFormRequest extends BaseRequest implements CreatePersonFormRequestInterface {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return App::make('\Ixudra\Portfolio\Interfaces\Services\Validation\PersonValidationHelperInterface')
            ->getFormValidationRules( 'create' );
    }

}
