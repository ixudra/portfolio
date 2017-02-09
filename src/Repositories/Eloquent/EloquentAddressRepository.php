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

        if( array_key_exists('city', $filters) ) {
            $results = $results
                ->where( 'city', '=', $filters[ 'city' ] );
        }

        return $this->paginated($results, $filters, $size);
    }

}
