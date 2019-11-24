<?php namespace Ixudra\Portfolio\Http\Requests\Projects;


use Ixudra\Core\Http\Requests\BaseRequest;
use Ixudra\Portfolio\Interfaces\Services\Validation\ProjectValidationHelperInterface;

use App;

class FilterProjectFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return App::make( ProjectValidationHelperInterface::class )
            ->getFilterValidationRules();
    }

}
