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

    public function search($filters, $resultsPerPage)
    {
        $results = $this->getModel();
        foreach( $filters as $key => $value ) {
            if( !$this->hasString( $filters, $key ) ) {
                continue;
            }

            $results = $results->where( $key, 'like', $value );
        }

        return $results
            ->select($this->getTable() .'.*')
            ->paginate($resultsPerPage)
            ->appends($filters)
            ->appends('results_per_page', $resultsPerPage);
    }

}
