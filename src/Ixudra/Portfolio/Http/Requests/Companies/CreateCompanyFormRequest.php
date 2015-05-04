<?php namespace Ixudra\Portfolio\Http\Requests\Companies;


use Ixudra\Core\Http\Requests\BaseRequest;
use Ixudra\Portfolio\Interfaces\Http\Requests\Companies\CreateCompanyFormRequestInterface;

use App;

class CreateCompanyFormRequest extends BaseRequest implements CreateCompanyFormRequestInterface {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return App::make('\Ixudra\Portfolio\Interfaces\Services\Validation\CompanyValidationHelperInterface')
            ->getFormValidationRules( 'create' );
    }

}
