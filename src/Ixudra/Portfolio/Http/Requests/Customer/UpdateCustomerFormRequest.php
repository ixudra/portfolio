<?php namespace Ixudra\Portfolio\Http\Requests\Customer;


use Ixudra\Core\Http\Requests\BaseRequest;

use App;

class UpdateCustomerFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return $this->getCustomerTypeFormRequest()->rules();
    }

    protected function getCustomerTypeFormRequest()
    {
        $formRequest = '\Ixudra\Portfolio\Http\Requests\Companies\UpdateCompanyFormRequest';
        if( $this->input('customerType') == 'person' ) {
            $formRequest = '\Ixudra\Portfolio\Http\Requests\People\UpdatePersonFormRequest';
        }

        return App::make( $formRequest );
    }

}
