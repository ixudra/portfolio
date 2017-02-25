<?php namespace Ixudra\Portfolio\Services\Validation;


use Ixudra\Core\Services\Validation\BaseValidationHelper;
use Ixudra\Portfolio\Interfaces\Services\Validation\CustomerValidationHelperInterface;

use App;

class CustomerValidationHelper extends BaseValidationHelper implements CustomerValidationHelperInterface {

    protected $customerType;


    public function __construct($customerType = 'company')
    {
        $this->customerType = $customerType;
    }


    public function getFilterValidationRules()
    {
        return array(
            'query'             => '',
            'withProject'       => 'boolean'
        );
    }

    public function getFormValidationRules($formName, $prefix = '')
    {
        return $this->getCustomerTypeValidationHelper()->getFormValidationRules( $formName, $prefix );
    }

    protected function getCustomerTypeValidationHelper()
    {
        $validationHelper = 'Ixudra\Portfolio\Interfaces\Services\Validation\CompanyValidationHelperInterface';
        if( $this->customerType === 'person' ) {
            $validationHelper = 'Ixudra\Portfolio\Interfaces\Services\Validation\PersonValidationHelperInterface';
        }

        return App::make( $validationHelper );
    }

    public function getRequiredFormFields($formName, $prefix = '')
    {
        $rules = $this->getFormValidationRules( 'update', $prefix );
        if( $formName === 'create' ) {
            $rules = array_merge(
                App::make( 'Ixudra\Portfolio\Interfaces\Services\Validation\CompanyValidationHelperInterface' )->getFormValidationRules( $formName ),
                App::make( 'Ixudra\Portfolio\Interfaces\Services\Validation\PersonValidationHelperInterface' )->getFormValidationRules( $formName )
            );
        }

        $requiredFields = array();
        foreach( $rules as $key => $value ) {
            if( $this->isRequired( $value ) ) {
                $requiredFields[] = $key;
            }
        }

        return $requiredFields;
    }

}