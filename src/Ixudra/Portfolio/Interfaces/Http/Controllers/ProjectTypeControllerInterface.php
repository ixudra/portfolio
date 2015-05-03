<?php namespace Ixudra\Portfolio\Interfaces\Http\Controllers;


use Translate;

use Ixudra\Portfolio\Http\Requests\ProjectType\FilterProjectTypeFormRequestInterface;
use Ixudra\Portfolio\Http\Requests\ProjectType\CreateProjectTypeFormRequestInterface;
use Ixudra\Portfolio\Http\Requests\ProjectType\UpdateProjectTypeFormRequestInterface;
use Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectTypeRepositoryInterface;
use Ixudra\Portfolio\Services\Html\ProjectTypeViewFactoryInterface;
use Ixudra\Portfolio\Services\Factories\ProjectTypeFactoryInterface;

interface ProjectTypeControllerInterface {

    public function __construct(EloquentProjectTypeRepositoryInterface $projectTypeRepository, ProjectTypeViewFactoryInterface $projectTypeViewFactory);

    public function index();

    public function filter(FilterProjectTypeFormRequestInterface $request);

    public function create();

    public function store(CreateProjectTypeFormRequestInterface $request, ProjectTypeFactoryInterface $projectTypeFactory);

    public function show($id);

    public function edit($id);

    public function update($id, UpdateProjectTypeFormRequestInterface $request, ProjectTypeFactoryInterface $projectTypeFactory);

    public function destroy($id);

}
