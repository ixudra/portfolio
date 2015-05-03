<?php namespace Ixudra\Portfolio\Interfaces\Repositories\Eloquent;


use Ixudra\Core\Repositories\Eloquent\BaseEloquentRepositoryInterface;
use Ixudra\Portfolio\Models\PersonInterface;

interface EloquentPersonRepositoryInterface {

    public function search($filters, $resultsPerPage = 25);

}
