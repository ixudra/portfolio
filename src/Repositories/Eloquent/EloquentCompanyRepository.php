<?php namespace Ixudra\Portfolio\Repositories\Eloquent;


use Ixudra\Core\Repositories\Eloquent\BaseEloquentRepository;
use Ixudra\Portfolio\Interfaces\Repositories\CompanyRepositoryInterface;

use Config;

class EloquentCompanyRepository extends BaseEloquentRepository implements CompanyRepositoryInterface {

    protected function getModel()
    {
        $className = Config::get('bindings.models.company');

        return new $className;
    }

    protected function getTable()
    {
        return 'companies';
    }


    public function search($filters, $size = 25)
    {
        $results = $this->getModel();

        if( array_key_exists('query', $filters) && $filters[ 'query' ] != '' ) {
            $query = '%'. $filters[ 'query' ] .'%';
            $results = $results
                ->where('name', 'like', $query)
                ->orWhere('url', 'like', $query)
                ->orWhere('email', 'like', $query);
        }

        return $this->paginated($results, $filters, $size);
    }

    protected function paginated($results, $filters = array(), $size = 25)
    {
        return $results
            ->select($this->getTable() .'.*')
            ->with('corporateAddress', 'representative')
            ->paginate($size)
            ->appends($filters)
            ->appends('size', $size);
    }

}
