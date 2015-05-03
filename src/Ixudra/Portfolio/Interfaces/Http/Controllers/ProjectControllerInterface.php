<?php namespace Ixudra\Portfolio\Interfaces\Http\Controllers;


use Translate;

use Ixudra\Portfolio\Http\Requests\Project\FilterProjectFormRequestInterface;
use Ixudra\Portfolio\Http\Requests\Project\CreateProjectFormRequestInterface;
use Ixudra\Portfolio\Http\Requests\Project\UpdateProjectFormRequestInterface;
use Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectRepositoryInterface;
use Ixudra\Portfolio\Services\Html\ProjectViewFactoryInterface;
use Ixudra\Portfolio\Services\Factories\ProjectFactoryInterface;

interface ProjectControllerInterface {

    public function __construct(EloquentProjectRepositoryInterface $projectRepository, ProjectViewFactoryInterface $projectViewFactory);

    public function index();

    public function filter(FilterProjectFormRequestInterface $request);

    public function create();

    public function store(CreateProjectFormRequestInterface $request, ProjectFactoryInterface $projectFactory);

    public function show($id);

    public function edit($id);

    public function update($id, UpdateProjectFormRequestInterface $request, ProjectFactoryInterface $projectFactory);

    public function destroy($id);

}
