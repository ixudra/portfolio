<?php namespace Ixudra\Portfolio\Http\Requests\Companies;


use Ixudra\Core\Http\Requests\BaseRequest;
use Ixudra\Portfolio\Interfaces\Http\Requests\Companies\FilterCompanyFormRequestInterface;

use App;

class FilterCompanyFormRequest extends BaseRequest implements FilterCompanyFormRequestInterface {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return App::make('\Ixudra\Portfolio\Interfaces\Services\Validation\CompanyValidationHelperInterface')
            ->getFilterValidationRules();
    }

}
