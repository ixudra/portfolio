<?php namespace Ixudra\Portfolio\Http\Requests\People;


use Ixudra\Core\Http\Requests\BaseRequest;
use Ixudra\Portfolio\Interfaces\Http\Requests\People\UpdatePersonFormRequestInterface;

use App;

class UpdatePersonFormRequest extends BaseRequest implements UpdatePersonFormRequestInterface {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return App::make('\Ixudra\Portfolio\Interfaces\Services\Validation\PersonValidationHelperInterface')
            ->getFormValidationRules( 'update' );
    }

}
