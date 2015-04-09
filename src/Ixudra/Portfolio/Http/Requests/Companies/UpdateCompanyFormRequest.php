<?php namespace Ixudra\Portfolio\Http\Requests\Companies;


use Ixudra\Core\Http\Requests\BaseRequest;
use Ixudra\Portfolio\Models\Company;
use Ixudra\Portfolio\Models\Address;
use Ixudra\Portfolio\Models\Person;

class UpdateCompanyFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return array_merge(
            $this->getPrefixedRules( Company::getRules() ),
            $this->getPrefixedRules( Address::getRules(), 'corporate_address' ),
            $this->getPrefixedRules( Address::getRules(), 'billing_address', true ),
            $this->getPrefixedRules( Person::getRules(), 'representative' )
        );
    }

}
