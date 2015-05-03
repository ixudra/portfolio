<?php namespace Ixudra\Portfolio\Interfaces\Http\Controllers;


use Ixudra\Portfolio\Interfaces\Http\Requests\People\FilterPersonFormRequestInterface;
use Ixudra\Portfolio\Interfaces\Http\Requests\People\CreatePersonFormRequestInterface;
use Ixudra\Portfolio\Interfaces\Http\Requests\People\UpdatePersonFormRequestInterface;
use Ixudra\Portfolio\Interfaces\Services\Factories\PersonFactoryInterface;

interface PersonControllerInterface {

    public function index();

    public function filter(FilterPersonFormRequestInterface $request);

    public function create();

    public function store(CreatePersonFormRequestInterface $request, PersonFactoryInterface $personFactory);

    public function show($id);

    public function edit($id);

    public function update($id, UpdatePersonFormRequestInterface $request, PersonFactoryInterface $personFactory);

    public function destroy($id);

}
