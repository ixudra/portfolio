<?php namespace Ixudra\Portfolio\Services\Input;


use Ixudra\Core\Services\Input\BaseInputHelper;
use Ixudra\Portfolio\Interfaces\Services\Input\CompanyInputHelperInterface;
use Ixudra\Portfolio\Interfaces\Services\Input\CustomerInputHelperInterface;
use Ixudra\Portfolio\Interfaces\Services\Input\PersonInputHelperInterface;

class CustomerInputHelper extends BaseInputHelper implements CustomerInputHelperInterface {

    protected $companyInputHelper;

    protected $personInputHelper;


    public function __construct(CompanyInputHelperInterface $companyInputHelper, PersonInputHelperInterface $personInputHelper)
    {
        $this->companyInputHelper = $companyInputHelper;
        $this->personInputHelper = $personInputHelper;
    }


    public function getDefaultInput($prefix = '')
    {
        $companyInput = $this->companyInputHelper->getDefaultInput('company');
        $personInput = $this->personInputHelper->getDefaultInput('person');

        return array_merge(
            $companyInput,
            $personInput
        );
    }

    public function getInputForModel($model, $prefix = '')
    {
        if( $model->object->getPlural() === 'companies' ) {
            $input = $this->companyInputHelper->getInputForModel( $model->object, $prefix );
        } else {
            $input = $this->personInputHelper->getInputForModel( $model->object, $prefix );
        }

        return $input;
    }

    public function getInputForSearch($input)
    {
        if( array_key_exists('_token', $input) ) {
            unset( $input[ '_token' ] );
        }

        if( array_key_exists('query', $input) && $input[ 'query' ] != '' ) {
            $input[ 'query' ] = '%'. $input[ 'query' ] .'%';
        }

        return $input;
    }

}
