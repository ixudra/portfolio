<?php namespace Ixudra\Portfolio\Services\Form;


use App;
use Translate;

use Ixudra\Core\Services\Form\BaseFormHelper;

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
            $results[ '' ] = 'None';
        }

        foreach( $statuses as $status ) {
            $results[ $status ] = Translate::recursive('statuses.project.'. $status);
        }

        return $results;
    }

}