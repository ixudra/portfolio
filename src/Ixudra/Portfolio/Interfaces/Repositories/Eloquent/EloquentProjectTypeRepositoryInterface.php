<?php namespace Ixudra\Portfolio\Interfaces\Repositories\Eloquent;


use Ixudra\Core\Repositories\Eloquent\BaseEloquentRepositoryInterface;

use Ixudra\Portfolio\Models\ProjectTypeInterface;

interface EloquentProjectTypeRepositoryInterface {

    public function search($filters, $resultsPerPage = 25);

}
