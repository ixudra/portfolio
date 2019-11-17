<?php namespace Ixudra\Portfolio\Services\Validation;


use Ixudra\Core\Services\Validation\BaseValidationHelper;
use Ixudra\Portfolio\Interfaces\Services\Validation\ProjectValidationHelperInterface;
use Ixudra\Imageable\Models\Image;

use Config;

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

    public function getFormValidationRules($formName, $prefix = '')
    {
        $projectClassName = Config::get('bindings.models.project');

        $rules = array_merge(
            $projectClassName::getRules(),
            Image::getRules()
        );

        if( $formName === 'update' ) {
            $rules[ 'file' ] = $this->makeOptional( $rules[ 'file' ] );
        }

        return $rules;
    }

}
