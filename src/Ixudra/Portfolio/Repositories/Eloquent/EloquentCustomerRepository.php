<?php namespace Ixudra\Portfolio\Repositories\Eloquent;


use Ixudra\Core\Repositories\Eloquent\BaseEloquentRepository;

use Ixudra\Portfolio\Models\Customer;

class EloquentCustomerRepository extends BaseEloquentRepository {

    protected function getModel()
    {
        return new Customer;
    }

    protected function getTable()
    {
        return 'customers';
    }

    public function used()
    {
        return $this->getModel()
            ->join('projects', 'customers.id', '=', 'projects.customer_id')
            ->select($this->getTable() .'.*')
            ->get();
    }

    public function search($filters, $resultsPerPage)
    {
        $results = $this->getModel();
        $results = $results
            ->join('projects', 'customers.id', '=', 'projects.customer_id');

        if( array_key_exists('query', $filters) && $filters[ 'query' ] != '' ) {
            $results = $results
                ->leftJoin('people', function($join)
                {
                    $join->on('customers.customer_id', '=', 'people.id')
                        ->where('customers.customer_type', '=', 'Ixudra\\Portfolio\\Models\\Person');
                })
                ->leftJoin('companies', function($join)
                {
                    $join->on('customers.customer_id', '=', 'companies.id')
                        ->where('customers.customer_type', '=', 'Ixudra\\Portfolio\\Models\\Company');
                });

            $query = '%'. $filters[ 'query' ] .'%';
            $results = $results
                ->where('companies.name', 'like', $query)
                ->orWhere('people.first_name', 'like', $query)
                ->orWhere('people.last_name', 'like', $query);
        }

        return $results
            ->select($this->getTable() .'.*')
            ->paginate($resultsPerPage)
            ->appends($filters)
            ->appends('results_per_page', $resultsPerPage);
    }

}
