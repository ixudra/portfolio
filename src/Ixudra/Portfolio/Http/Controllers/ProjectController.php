<?php namespace Ixudra\Portfolio\Http\Controllers;


use Ixudra\Core\Http\Controllers\BaseController;
use Ixudra\Portfolio\Interfaces\Http\Controllers\ProjectControllerInterface;
use Ixudra\Portfolio\Interfaces\Http\Requests\Projects\CreateProjectFormRequestInterface;
use Ixudra\Portfolio\Interfaces\Http\Requests\Projects\FilterProjectFormRequestInterface;
use Ixudra\Portfolio\Interfaces\Http\Requests\Projects\UpdateProjectFormRequestInterface;
use Ixudra\Portfolio\Interfaces\Repositories\ProjectRepositoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Factories\ProjectFactoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Html\ProjectViewFactoryInterface;

use Translate;

class ProjectController extends BaseController implements ProjectControllerInterface {

    protected $projectRepository;

    protected $projectViewFactory;


    public function __construct(ProjectRepositoryInterface $projectRepository, ProjectViewFactoryInterface $projectViewFactory)
    {
        $this->projectRepository = $projectRepository;
        $this->projectViewFactory = $projectViewFactory;
    }


    public function index()
    {
        return $this->projectViewFactory->index();
    }

    public function filter(FilterProjectFormRequestInterface $request)
    {
        return $this->projectViewFactory->index( $request->getInput() );
    }

    public function create()
    {
        return $this->projectViewFactory->create();
    }

    public function store(CreateProjectFormRequestInterface $request, ProjectFactoryInterface $projectFactory)
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

    public function update($id, UpdateProjectFormRequestInterface $request, ProjectFactoryInterface $projectFactory)
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
