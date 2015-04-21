<?php namespace Ixudra\Portfolio\Http\Requests\Project;


use Ixudra\Core\Http\Requests\BaseRequest;

use App;

class FilterProjectFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return App::make('\Ixudra\Portfolio\Services\Validation\ProjectValidationHelper')
            ->getFilterValidationRules();
    }

}
