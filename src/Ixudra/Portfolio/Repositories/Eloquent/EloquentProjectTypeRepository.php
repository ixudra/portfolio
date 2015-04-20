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

    public function search($filters, $resultsPerPage = 25)
    {
        $results = $this->getModel();
        foreach( $filters as $key => $value ) {
            if( !$this->hasString( $filters, $key ) ) {
                continue;
            }

            $results = $results->where( $key, 'like', '%'. $value .'%' );
        }

        return $results
            ->select($this->getTable() .'.*')
            ->paginate($resultsPerPage)
            ->appends($filters)
            ->appends('size', $resultsPerPage);
    }

}
