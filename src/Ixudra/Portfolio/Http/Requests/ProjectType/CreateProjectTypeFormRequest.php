<?php namespace Ixudra\Portfolio\Http\Requests\ProjectType;


use Ixudra\Core\Http\Requests\BaseRequest;

use App;

class CreateProjectTypeFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return App::make('\Ixudra\Portfolio\Services\Validation\ProjectTypeValidationHelper')
            ->getFormValidationRules( 'create' );
    }

}
