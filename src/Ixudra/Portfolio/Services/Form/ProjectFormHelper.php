<?php namespace Ixudra\Portfolio\Services\Form;


use App;
use Translate;

use Ixudra\Core\Services\Form\BaseFormHelper;
use Ixudra\Portfolio\Models\Project;
use Ixudra\Imageable\Models\Image;

class ProjectFormHelper extends BaseFormHelper {

    protected $repository;


    public function __construct()
    {
        $this->repository = App::make('\Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectRepository');
    }


    public function getStatusesAsSelectList($includeNull = false)
    {
        $statuses = array(
            'unknown',
            'open',
            'scheduled',
            'in_development',
            'completed',
            'cancelled'
        );

        $results = array();
        if( $includeNull ) {
            $results[ '' ] = Translate::recursive('common.none');
        }

        foreach( $statuses as $status ) {
            $results[ $status ] = Translate::recursive('portfolio::statuses.project.'. $status);
        }

        return $results;
    }

    public function getVisibilityOptionsAsSelectList($includeNull = false)
    {
        return $this->getBooleanSelectList( $includeNull );
    }

    public function getValidationRules($formName)
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

    protected function makeOptional($rule)
    {
        $rule = str_replace('required|', '', $rule);
        $rule = str_replace('|required', '', $rule);
        $rule = str_replace('required', '', $rule);

        return $rule;
    }

    public function getRequiredFields($formName)
    {
        $rules = $this->getValidationRules( $formName );

        $requiredFields = array();
        foreach( $rules as $key => $value ) {
            if( $this->isRequired( $value ) ) {
                $requiredFields[] = $key;
            }
        }

        return $requiredFields;
    }

    protected function isRequired($rule)
    {
        $conditions = explode('|', $rule);
        if( in_array('required', $conditions) ) {
            return true;
        }

        return false;
    }

}