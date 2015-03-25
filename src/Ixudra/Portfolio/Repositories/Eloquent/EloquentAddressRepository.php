<?php namespace Ixudra\Portfolio\Repositories\Eloquent;


use Ixudra\Core\Repositories\Eloquent\BaseEloquentRepository;
use Ixudra\Portfolio\Models\Address;

class EloquentAddressRepository extends BaseEloquentRepository {

    protected function getModel()
    {
        return new Address;
    }

    protected function getTable()
    {
        return 'addresses';
    }


    public function search($filters, $resultsPerPage)
    {
        $results = $this->getModel();

        if( array_key_exists('city', $filters) ) {
            $results = $results
                ->where( 'city', '=', $filters[ 'city' ] );
        }

        return $results
            ->select($this->getTable() .'.*')
            ->paginate($resultsPerPage)
            ->appends($filters)
            ->appends('results_per_page', $resultsPerPage);
    }

}
