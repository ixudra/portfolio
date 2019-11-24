<?php namespace Ixudra\Portfolio\Http\Controllers;


use Illuminate\Http\Request;
use Ixudra\Core\Http\Controllers\BaseController;
use Ixudra\Portfolio\Interfaces\Repositories\ProjectRepositoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Factories\ProjectFactoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Html\ProjectViewFactoryInterface;
use Ixudra\Portfolio\Http\Requests\Projects\CreateProjectFormRequest;
use Ixudra\Portfolio\Http\Requests\Projects\FilterProjectFormRequest;
use Ixudra\Portfolio\Http\Requests\Projects\UpdateProjectFormRequest;

use Translate;

class ProjectController extends BaseController {

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

    public function filter(FilterProjectFormRequest $request)
    {
        return $this->projectViewFactory->index( $request->getInput() );
    }

    public function create(Request $request)
    {
        return $this->projectViewFactory->create( $request->all() );
    }

    public function store(CreateProjectFormRequest $request, ProjectFactoryInterface $projectFactory)
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

    public function update($id, UpdateProjectFormRequest $request, ProjectFactoryInterface $projectFactory)
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
