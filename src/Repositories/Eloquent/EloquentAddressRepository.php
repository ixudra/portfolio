<?php namespace Ixudra\Portfolio\Repositories\Eloquent;


use Ixudra\Core\Repositories\Eloquent\BaseEloquentRepository;
use Ixudra\Portfolio\Interfaces\Repositories\AddressRepositoryInterface;

use Config;

class EloquentAddressRepository extends BaseEloquentRepository implements AddressRepositoryInterface {

    protected function getModel()
    {
        $className = Config::get('bindings.models.address');

        return new $className;
    }

    protected function getTable()
    {
        return 'addresses';
    }


    public function search($filters, $size = 25)
    {
        $results = $this->getModel();

        if( array_key_exists('query', $filters) && !empty($filters[ 'query' ]) ) {
            $results = $results
                ->where('addresses.street_1', 'like', $filters[ 'query' ])
                ->orWhere('addresses.street_2', 'like', $filters[ 'query' ])
                ->orWhere('addresses.city', 'like', $filters[ 'query' ]);
        }

        return $this->paginated($results, $filters, $size);
    }

}
