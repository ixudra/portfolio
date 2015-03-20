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
            'contractor_id',
            'project_type_id',
        );

        $results = $this->getModel();
        $results = $this->applyForeignKeys( $results, $foreignKeys, $filters );

        return $results
            ->select($this->getTable() .'.*')
            ->paginate($resultsPerPage)
            ->appends($filters)
            ->appends('results_per_page', $resultsPerPage);
    }

}