<?php namespace Ixudra\Portfolio\Repositories\Eloquent;


use Ixudra\Core\Repositories\Eloquent\BaseEloquentRepository;
use Ixudra\Portfolio\Models\Company;

class EloquentCompanyRepository extends BaseEloquentRepository {

    protected function getModel()
    {
        return new Company;
    }

    protected function getTable()
    {
        return 'companies';
    }


    public function search($filters, $resultsPerPage)
    {
        $results = $this->getModel();

        if( array_key_exists('query', $filters) && $filters[ 'query' ] != '' ) {
            $query = '%'. $filters[ 'query' ] .'%';
            $results = $results
                ->where('name', 'like', $query)
                ->where('url', 'like', $query)
                ->orWhere('email', 'like', $query);
        }

        return $results
            ->select($this->getTable() .'.*')
            ->paginate($resultsPerPage)
            ->appends($filters)
            ->appends('results_per_page', $resultsPerPage);
    }

}
