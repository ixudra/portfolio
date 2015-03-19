<?php namespace Ixudra\Portfolio\Http\Requests\ProjectType;


use Ixudra\Core\Http\Requests\BaseRequest;

use Ixudra\Portfolio\Models\ProjectType;

class CreateProjectTypeFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return ProjectType::getRules();
    }

}
