<?php namespace Ixudra\Portfolio\Http\Requests\Project;


use Ixudra\Core\Http\Requests\BaseRequest;

class FilterProjectFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return array(
            'query'                     => '',
            'customer_id'               => 'required|integer',
            'project_type_id'           => 'required|integer',
            'hidden'                    => 'boolean',
        );
    }

}
