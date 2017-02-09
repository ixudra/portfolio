<?php namespace Ixudra\Portfolio\Services\Input;


use Ixudra\Core\Services\Input\BaseInputHelper;
use Ixudra\Portfolio\Interfaces\Services\Input\AddressInputHelperInterface;
use Ixudra\Portfolio\Interfaces\Services\Input\CompanyInputHelperInterface;
use Ixudra\Portfolio\Interfaces\Services\Input\PersonInputHelperInterface;

use Config;

class CompanyInputHelper extends BaseInputHelper implements CompanyInputHelperInterface {

    protected $addressInputHelper;

    protected $personInputHelper;


    public function __construct(AddressInputHelperInterface $addressInputHelper, PersonInputHelperInterface $personInputHelper)
    {
        $this->addressInputHelper = $addressInputHelper;
        $this->personInputHelper = $personInputHelper;
    }


    public function getDefaultInput($prefix = '')
    {
        $companyClassName = Config::get('bindings.models.company');
        $personClassName = Config::get('bindings.models.person');

        $input = array_merge(
            $this->getPrefixedInput( $companyClassName::getDefaults(), $prefix ),
            $this->addressInputHelper->getDefaultInput( 'corporate_address' ),
            $this->addressInputHelper->getDefaultInput( 'billing_address' ),
            $this->getPrefixedInput( $personClassName::getDefaults(), 'representative' )
        );

        return $input;
    }

    public function getInputForModel($model, $prefix = '')
    {
        return array_merge(
            $this->getPrefixedInput( $model->attributesToArray(), $prefix ),
            $this->addressInputHelper->getInputForModel( $model->corporateAddress, 'corporate_address' ),
            $this->getPrefixedInput( $model->representative->attributesToArray(), 'representative' )
        );
    }

}