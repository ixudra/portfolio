<?php namespace Ixudra\Portfolio\Http\Requests\ProjectTypes;


use Ixudra\Core\Http\Requests\BaseRequest;
use Ixudra\Portfolio\Interfaces\Services\Validation\ProjectTypeValidationHelperInterface;

use App;

class FilterProjectTypeFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return App::make( ProjectTypeValidationHelperInterface::class )
            ->getFilterValidationRules();
    }

}
