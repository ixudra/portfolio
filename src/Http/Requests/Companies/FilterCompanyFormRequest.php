<?php namespace Ixudra\Portfolio\Http\Requests\Companies;


use Ixudra\Core\Http\Requests\BaseRequest;

use App;

class FilterCompanyFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return App::make( 'Ixudra\Portfolio\Interfaces\Services\Validation\CompanyValidationHelperInterface' )
            ->getFilterValidationRules();
    }

}
