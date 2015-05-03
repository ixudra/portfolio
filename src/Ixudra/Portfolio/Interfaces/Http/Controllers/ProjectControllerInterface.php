<?php namespace Ixudra\Portfolio\Interfaces\Http\Controllers;


use Ixudra\Portfolio\Interfaces\Http\Requests\Projects\FilterProjectFormRequestInterface;
use Ixudra\Portfolio\Interfaces\Http\Requests\Projects\CreateProjectFormRequestInterface;
use Ixudra\Portfolio\Interfaces\Http\Requests\Projects\UpdateProjectFormRequestInterface;
use Ixudra\Portfolio\Interfaces\Services\Factories\ProjectFactoryInterface;

interface ProjectControllerInterface {

    public function index();

    public function filter(FilterProjectFormRequestInterface $request);

    public function create();

    public function store(CreateProjectFormRequestInterface $request, ProjectFactoryInterface $projectFactory);

    public function show($id);

    public function edit($id);

    public function update($id, UpdateProjectFormRequestInterface $request, ProjectFactoryInterface $projectFactory);

    public function destroy($id);

}
