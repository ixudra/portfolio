<?php namespace Ixudra\Portfolio\Repositories\Eloquent;


use Ixudra\Core\Repositories\Eloquent\BaseEloquentRepository;

use Ixudra\Portfolio\Interfaces\Repositories\ProjectTypeRepositoryInterface;

use Config;

class EloquentProjectTypeRepository extends BaseEloquentRepository implements ProjectTypeRepositoryInterface {

    protected function getModel()
    {
        $className = Config::get('bindings.models.projectType');

        return new $className;
    }

    protected function getTable()
    {
        return 'project_types';
    }

    public function search($filters, $size = 25)
    {
        $results = $this->getModel();

        if( array_key_exists('query', $filters) && $filters[ 'query' ] !== '' ) {
            $results = $results
                ->where('project_types.key', 'like', $filters[ 'query' ]);
        }

        return $this->paginated($results, $filters, $size);
    }

}
