<?php namespace Ixudra\Portfolio\Http\Requests\Projects;


use Ixudra\Core\Http\Requests\BaseRequest;
use Ixudra\Portfolio\Interfaces\Http\Requests\Projects\FilterProjectFormRequestInterface;

use App;

class FilterProjectFormRequest extends BaseRequest implements FilterProjectFormRequestInterface {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return App::make('\Ixudra\Portfolio\Interfaces\Services\Validation\ProjectValidationHelperInterface')
            ->getFilterValidationRules();
    }

}
