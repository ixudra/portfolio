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

}
