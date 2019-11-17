<?php namespace Ixudra\Portfolio\Repositories\Eloquent;


use Ixudra\Core\Repositories\Eloquent\BaseEloquentRepository;
use Ixudra\Portfolio\Interfaces\Repositories\ProjectRepositoryInterface;

use Config;

class EloquentProjectRepository extends BaseEloquentRepository implements ProjectRepositoryInterface {

    public function getModel()
    {
        $className = Config::get('bindings.models.project');

        return new $className;
    }

    public function getTable()
    {
        return 'projects';
    }

    public function search($filters, $size = 25)
    {
        $foreignKeys = array(
            'customer_id',
            'project_type_id',
        );

        $results = $this->getModel();
        $results = $this->applyBoolean( $results, array('hidden'), $filters );
        $results = $this->applyForeignKeys( $results, $foreignKeys, $filters );

        if( array_key_exists('query', $filters) && $filters[ 'query' ] !== '' ) {
            $query = '%'. $filters[ 'query' ] .'%';
            $results = $results
                ->where('projects.name', 'like', $query);
        }

        return $this->paginated($results, $filters, $size);
    }

    protected function paginated($results, $filters = array(), $size = 25)
    {
        return $results
            ->select($this->getTable() .'.*')
            ->with('projectType', 'customer', 'image')
            ->paginate($size)
            ->appends($filters)
            ->appends('size', $size);
    }

}
