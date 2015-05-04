<?php namespace Ixudra\Portfolio\Services\Validation;


use Ixudra\Core\Services\Validation\BaseValidationHelper;
use Ixudra\Portfolio\Interfaces\Services\Validation\ProjectValidationHelperInterface;
use Ixudra\Portfolio\Interfaces\Models\ProjectInterface;
use Ixudra\Imageable\Models\Image;

class ProjectValidationHelper extends BaseValidationHelper implements ProjectValidationHelperInterface {

    public function getFilterValidationRules()
    {
        return array(
            'query'                     => '',
            'customer_id'               => 'required|integer',
            'project_type_id'           => 'required|integer',
            'hidden'                    => 'boolean',
        );
    }

    public function getFormValidationRules($formName)
    {
        $rules = array_merge(
            ProjectInterface::getRules(),
            Image::getRules()
        );

        if( $formName == 'update' ) {
            $rules[ 'file' ] = $this->makeOptional( $rules[ 'file' ] );
        }

        return $rules;
    }

}