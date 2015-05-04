<?php namespace Ixudra\Portfolio\Http\Requests\ProjectTypes;


use Ixudra\Core\Http\Requests\BaseRequest;
use Ixudra\Portfolio\Interfaces\Http\Requests\ProjectTypes\FilterProjectTypeFormRequestInterface;

use App;

class FilterProjectTypeFormRequest extends BaseRequest implements FilterProjectTypeFormRequestInterface {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return App::make('\Ixudra\Portfolio\Interfaces\Services\Validation\ProjectTypeValidationHelperInterface')
            ->getFilterValidationRules();
    }

}
