<?php namespace Ixudra\Portfolio\Interfaces\Http\Controllers;


use Ixudra\Portfolio\Interfaces\Http\Requests\ProjectTypes\FilterProjectTypeFormRequestInterface;
use Ixudra\Portfolio\Interfaces\Http\Requests\ProjectTypes\CreateProjectTypeFormRequestInterface;
use Ixudra\Portfolio\Interfaces\Http\Requests\ProjectTypes\UpdateProjectTypeFormRequestInterface;
use Ixudra\Portfolio\Interfaces\Services\Factories\ProjectTypeFactoryInterface;

interface ProjectTypeControllerInterface {

    public function index();

    public function filter(FilterProjectTypeFormRequestInterface $request);

    public function create();

    public function store(CreateProjectTypeFormRequestInterface $request, ProjectTypeFactoryInterface $projectTypeFactory);

    public function show($id);

    public function edit($id);

    public function update($id, UpdateProjectTypeFormRequestInterface $request, ProjectTypeFactoryInterface $projectTypeFactory);

    public function destroy($id);

}
