<?php namespace Ixudra\Portfolio\Interfaces\Repositories\Eloquent;


use Ixudra\Core\Repositories\Eloquent\BaseEloquentRepositoryInterface;

use Ixudra\Portfolio\Models\CustomerInterface;

interface EloquentCustomerRepositoryInterface {

    public function used();

    public function search($filters, $resultsPerPage = 25);

}
