<?php namespace Ixudra\Portfolio\Interfaces\Repositories\Eloquent;


use Ixudra\Core\Repositories\Eloquent\BaseEloquentRepositoryInterface;

use Ixudra\Portfolio\Models\ProjectInterface;

interface EloquentProjectRepositoryInterface {

    public function getModel();

    public function getTable();

    public function search($filters, $resultsPerPage = 25);

}