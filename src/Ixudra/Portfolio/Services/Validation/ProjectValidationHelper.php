<?php namespace Ixudra\Portfolio\Services\Validation;


use Ixudra\Core\Services\Validation\BaseValidationHelper;
use Ixudra\Portfolio\Models\Project;
use Ixudra\Imageable\Models\Image;

class ProjectValidationHelper extends BaseValidationHelper {

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
            Project::getRules(),
            Image::getRules()
        );

        if( $formName == 'update' ) {
            $rules[ 'file' ] = $this->makeOptional( $rules[ 'file' ] );
        }

        return $rules;
    }

}