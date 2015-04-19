<?php namespace Ixudra\Portfolio\Http\Controllers;


use Translate;

use Ixudra\Core\Http\Controllers\BaseController;

use Ixudra\Portfolio\Http\Requests\Project\FilterProjectFormRequest;
use Ixudra\Portfolio\Http\Requests\Project\CreateProjectFormRequest;
use Ixudra\Portfolio\Http\Requests\Project\UpdateProjectFormRequest;
use Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectRepository;
use Ixudra\Portfolio\Services\Html\ProjectViewFactory;
use Ixudra\Portfolio\Services\Factories\ProjectFactory;

class ProjectController extends BaseController {

    protected $projectViewFactory;


    public function __construct(EloquentProjectRepository $projectRepository, ProjectViewFactory $projectViewFactory)
    {
        $this->projectRepository = $projectRepository;
        $this->projectViewFactory = $projectViewFactory;
    }


    public function index()
    {
        return $this->projectViewFactory->index();
    }

    public function filter(FilterProjectFormRequest $request)
    {
        return $this->projectViewFactory->index( $request->getInput() );
    }

    public function create()
    {
        return $this->projectViewFactory->create();
    }

    public function store(CreateProjectFormRequest $request, ProjectFactory $projectFactory)
    {
        $project = $projectFactory->make( $request->getInput(true) );

        return $this->redirect( 'admin.projects.show', array('id' => $project->id), 'success', array( Translate::model( 'portfolio::project.create.success' ) ) );
    }

    public function show($id)
    {
        $project = $this->projectRepository->find( $id );
        if( is_null($project) ) {
            return $this->modelNotFound();
        }

        return $this->projectViewFactory->show( $project );
    }

    public function edit($id)
    {
        $project = $this->projectRepository->find( $id );
        if( is_null($project) ) {
            return $this->modelNotFound();
        }

        return $this->projectViewFactory->edit( $project );
    }

    public function update($id, UpdateProjectFormRequest $request, ProjectFactory $projectFactory)
    {
        $project = $this->projectRepository->find( $id );
        if( is_null($project) ) {
            return $this->modelNotFound();
        }

        $projectFactory->modify( $project, $request->getInput(true) );

        return $this->redirect( 'admin.projects.show', array('id' => $id), 'success', array( Translate::model( 'portfolio::project.edit.success' ) ) );
    }

    public function destroy($id)
    {
        $project = $this->projectRepository->find( $id );
        if( is_null($project) ) {
            return $this->modelNotFound();
        }

        $project->delete();

        return $this->redirect( 'admin.projects.index', array(), 'success', array( Translate::model( 'portfolio::project.delete.success' ) ) );
    }

    protected function modelNotFound()
    {
        return $this->redirect( 'admin.projects.index', array(), 'error', array( Translate::model( 'portfolio::project.error.notFound' ) ) );
    }

}
