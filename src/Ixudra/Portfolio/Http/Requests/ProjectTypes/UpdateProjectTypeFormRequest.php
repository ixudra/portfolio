<?php namespace Ixudra\Portfolio\Http\Requests\ProjectTypes;


use Ixudra\Core\Http\Requests\BaseRequest;
use Ixudra\Portfolio\Interfaces\Http\Requests\ProjectTypes\UpdateProjectTypeFormRequestInterface;

use App;

class UpdateProjectTypeFormRequest extends BaseRequest implements UpdateProjectTypeFormRequestInterface {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return App::make('\Ixudra\Portfolio\Interfaces\Services\Validation\ProjectTypeValidationHelperInterface')
            ->getFormValidationRules( 'update' );
    }

}
