<?php namespace Ixudra\Portfolio\Interfaces\Repositories;


interface ProjectTypeRepositoryInterface {

    public function all();

    public function find($id);

    public function findByFilter($filters);

    public function search($filters, $resultsPerPage = 25);

}
