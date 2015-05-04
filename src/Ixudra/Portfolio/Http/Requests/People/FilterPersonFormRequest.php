<?php namespace Ixudra\Portfolio\Http\Requests\People;


use Ixudra\Core\Http\Requests\BaseRequest;
use Ixudra\Portfolio\Interfaces\Http\Requests\People\FilterPersonFormRequestInterface;

use App;

class FilterPersonFormRequest extends BaseRequest implements FilterPersonFormRequestInterface {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return App::make('\Ixudra\Portfolio\Interfaces\Services\Validation\PersonValidationHelperInterface')
            ->getFilterValidationRules();
    }

}
