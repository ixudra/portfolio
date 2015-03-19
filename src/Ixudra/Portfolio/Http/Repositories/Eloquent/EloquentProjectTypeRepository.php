<?php namespace Ixudra\Portfolio\Repositories\Eloquent;


use Ixudra\Core\Repositories\Eloquent\BaseEloquentRepository;

use Ixudra\Portfolio\Models\ProjectType;

class EloquentProjectTypeRepository extends BaseEloquentRepository {

    protected function getModel()
    {
        return new ProjectType;
    }

    protected function getTable()
    {
        return 'project_types';
    }

}
