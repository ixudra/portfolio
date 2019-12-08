<?php namespace Ixudra\Portfolio\Repositories\Eloquent;


use Ixudra\Core\Repositories\Eloquent\BaseEloquentRepository;
use Ixudra\Portfolio\Interfaces\Repositories\CustomerRepositoryInterface;

use Config;

class EloquentCustomerRepository extends BaseEloquentRepository implements CustomerRepositoryInterface {

    protected function getModel()
    {
        $className = Config::get('bindings.models.customer');

        return new $className;
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
            ->orderBy('name', 'asc')
            ->get();
    }

    public function search($filters, $size = 25)
    {
        $results = $this->getModel();

        if( array_key_exists('withProjects', $filters) && !empty($filters[ 'withProjects' ]) ) {
            if( $filters[ 'withProjects' ] == 1 ) {
                $results = $results
                    ->join('projects', 'customers.id', '=', 'projects.customer_id');
            } else if( $filters[ 'withProjects' ] == 0 ) {
                $results = $results
                    ->leftJoin('projects', 'customers.id', '=', 'projects.customer_id')
                    ->whereNull('projects.customer_id');
            }
        }

        if( array_key_exists('query', $filters) && !empty($filters[ 'query' ]) ) {
            $results = $results
                ->leftJoin('people', function($join)
                {
                    $join->on('customers.customer_id', '=', 'people.id')
                        ->where('customers.customer_type', '=', Config::get('bindings.models.person'));
                })
                ->leftJoin('companies', function($join)
                {
                    $join->on('customers.customer_id', '=', 'companies.id')
                        ->where('customers.customer_type', '=', Config::get('bindings.models.company'));
                });

            $results = $results
                ->where('companies.name', 'like', $filters[ 'query' ])
                ->orWhere('people.first_name', 'like', $filters[ 'query' ])
                ->orWhere('people.last_name', 'like', $filters[ 'query' ]);
        }

        return $this->paginated($results, $filters, $size);
    }

    protected function paginated($results, $filters = array(), $size = 25)
    {
        return $results
            ->select($this->getTable() .'.*')
            ->orderBy('name', 'asc')
            ->distinct()
            ->paginate($size)
            ->appends($filters)
            ->appends('size', $size);
    }

}
