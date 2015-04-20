<?php namespace Ixudra\Portfolio\Repositories\Eloquent;


use Ixudra\Core\Repositories\Eloquent\BaseEloquentRepository;
use Ixudra\Portfolio\Models\Person;

class EloquentPersonRepository extends BaseEloquentRepository {

    protected function getModel()
    {
        return new Person;
    }

    protected function getTable()
    {
        return 'people';
    }


    public function search($filters, $resultsPerPage = 25)
    {
        $results = $this->getModel();

        if( array_key_exists('query', $filters) && $filters[ 'query' ] != '' ) {
            $query = '%'. $filters[ 'query' ] .'%';
            $results = $results
                ->where('first_name', 'like', $query)
                ->orWhere('last_name', 'like', $query)
                ->orWhere('email', 'like', $query);
        }

        return $results
            ->select($this->getTable() .'.*')
            ->paginate($resultsPerPage)
            ->appends($filters)
            ->appends('size', $resultsPerPage);
    }

}
