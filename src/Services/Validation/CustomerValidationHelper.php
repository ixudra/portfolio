<?php namespace Ixudra\Portfolio\Services\Validation;


use Ixudra\Core\Services\Validation\BaseValidationHelper;
use Ixudra\Portfolio\Interfaces\Services\Validation\CustomerValidationHelperInterface;
use Ixudra\Portfolio\Interfaces\Services\Validation\CompanyValidationHelperInterface;
use Ixudra\Portfolio\Interfaces\Services\Validation\PersonValidationHelperInterface;

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
            'withProject'       => 'boolean',
        );
    }

    public function getFormValidationRules($formName, $prefix = '')
    {
        return $this->getCustomerTypeValidationHelper()->getFormValidationRules( $formName, $prefix );
    }

    protected function getCustomerTypeValidationHelper()
    {
        $validationHelper = CompanyValidationHelperInterface::class;
        if( $this->customerType === 'person' ) {
            $validationHelper = PersonValidationHelperInterface::class;
        }

        return App::make( $validationHelper );
    }

    public function getRequiredFormFields($formName, $prefix = '')
    {
        $rules = $this->getFormValidationRules( 'update', $prefix );
        if( $formName === 'create' ) {
            $rules = array_merge(
                App::make( CompanyValidationHelperInterface::class )->getFormValidationRules( $formName ),
                App::make( PersonValidationHelperInterface::class )->getFormValidationRules( $formName )
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
