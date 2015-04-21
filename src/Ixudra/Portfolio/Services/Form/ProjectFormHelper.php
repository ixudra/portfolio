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

}