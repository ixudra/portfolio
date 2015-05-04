<?php namespace Ixudra\Portfolio\Interfaces\Repositories;


interface CustomerRepositoryInterface {

    public function all();

    public function find($id);

    public function findByFilter($filters);

    public function used();

    public function search($filters, $resultsPerPage = 25);

}
