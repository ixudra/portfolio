<?php namespace Ixudra\Portfolio\Interfaces\Repositories;


interface PersonRepositoryInterface {

    public function all();

    public function find($id);

    public function findByFilter($filters);

    public function search($filters, $resultsPerPage = 25);

}
