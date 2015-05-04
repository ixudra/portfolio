<?php namespace Ixudra\Portfolio\Repositories\Eloquent;


use Ixudra\Core\Repositories\Eloquent\BaseEloquentRepository;
use Ixudra\Portfolio\Interfaces\Repositories\CompanyRepositoryInterface;
use Ixudra\Portfolio\Models\Company;

class EloquentCompanyRepository extends BaseEloquentRepository implements CompanyRepositoryInterface {

    protected function getModel()
    {
        return new Company;
    }

    protected function getTable()
    {
        return 'companies';
    }


    public function search($filters, $resultsPerPage = 25)
    {
        $results = $this->getModel();

        if( array_key_exists('query', $filters) && $filters[ 'query' ] != '' ) {
            $query = '%'. $filters[ 'query' ] .'%';
            $results = $results
                ->where('name', 'like', $query)
                ->orWhere('url', 'like', $query)
                ->orWhere('email', 'like', $query);
        }

        return $results
            ->select($this->getTable() .'.*')
            ->with('corporateAddress', 'representative')
            ->paginate($resultsPerPage)
            ->appends($filters)
            ->appends('size', $resultsPerPage);
    }

}
