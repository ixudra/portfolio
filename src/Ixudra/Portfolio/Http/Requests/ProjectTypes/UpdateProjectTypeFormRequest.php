<?php namespace Ixudra\Portfolio\Http\Requests\ProjectTypes;


use Ixudra\Core\Http\Requests\BaseRequest;

use App;

class UpdateProjectTypeFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return App::make('\Ixudra\Portfolio\Services\Validation\ProjectTypeValidationHelper')
            ->getFormValidationRules( 'update' );
    }

}
