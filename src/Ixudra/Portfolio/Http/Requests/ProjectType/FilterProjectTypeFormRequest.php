<?php namespace Ixudra\Portfolio\Http\Requests\ProjectType;


use Ixudra\Core\Http\Requests\BaseRequest;

class FilterProjectTypeFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return array(
            //...
        );
    }

}
