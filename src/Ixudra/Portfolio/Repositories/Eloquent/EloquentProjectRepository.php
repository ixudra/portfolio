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

    public function search($filters, $resultsPerPage)
    {
        $foreignKeys = array(
            'customer_id',
            'project_type_id',
        );

        $results = $this->getModel();
        $results = $this->applyBoolean( $results, array('hidden'), $filters );
        $results = $this->applyForeignKeys( $results, $foreignKeys, $filters );

        if( array_key_exists('query', $filters) && $filters[ 'query' ] != '' ) {
            $query = '%'. $filters[ 'query' ] .'%';
            $results = $results
                ->where('projects.name', 'like', $query);
        }

        return $results
            ->select($this->getTable() .'.*')
            ->with('projectType', 'customer')
            ->paginate($resultsPerPage)
            ->appends($filters)
            ->appends('results_per_page', $resultsPerPage);
    }

}