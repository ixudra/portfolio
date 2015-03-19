<?php namespace Ixudra\Portfolio\Repositories\Eloquent;


use Ixudra\Core\Repositories\Eloquent\BaseEloquentRepository;

use Ixudra\Portfolio\Models\Project;

class EloquentProjectRepository extends BaseEloquentRepository {

    public function getModel()
    {
        return new Project;
    }

    public function getTable()
    {
        return 'projects';
    }

}