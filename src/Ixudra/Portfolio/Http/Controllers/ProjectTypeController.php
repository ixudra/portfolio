<?php namespace Ixudra\Portfolio\Http\Controllers;


use Ixudra\Core\Http\Controllers\BaseController;
use Ixudra\Portfolio\Http\Requests\ProjectTypes\FilterProjectTypeFormRequest;
use Ixudra\Portfolio\Http\Requests\ProjectTypes\CreateProjectTypeFormRequest;
use Ixudra\Portfolio\Http\Requests\ProjectTypes\UpdateProjectTypeFormRequest;
use Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectTypeRepository;
use Ixudra\Portfolio\Services\Html\ProjectTypeViewFactory;
use Ixudra\Portfolio\Services\Factories\ProjectTypeFactory;

use Translate;

class ProjectTypeController extends BaseController {

    protected $projectTypeViewFactory;


    public function __construct(EloquentProjectTypeRepository $projectTypeRepository, ProjectTypeViewFactory $projectTypeViewFactory)
    {
        $this->projectTypeRepository = $projectTypeRepository;
        $this->projectTypeViewFactory = $projectTypeViewFactory;
    }


    public function index()
    {
        return $this->projectTypeViewFactory->index();
    }

    public function filter(FilterProjectTypeFormRequest $request)
    {
        return $this->projectTypeViewFactory->index( $request->getInput() );
    }

    public function create()
    {
        return $this->projectTypeViewFactory->create();
    }

    public function store(CreateProjectTypeFormRequest $request, ProjectTypeFactory $projectTypeFactory)
    {
        $projectType = $projectTypeFactory->make( $request->getInput() );

        return $this->redirect( 'admin.projectTypes.show', array('id' => $projectType->id), 'success', array( Translate::model( 'portfolio::projectType.create.success' ) ) );
    }

    public function show($id)
    {
        $projectType = $this->projectTypeRepository->find( $id );
        if( is_null($projectType) ) {
            return $this->modelNotFound();
        }

        return $this->projectTypeViewFactory->show( $projectType );
    }

    public function edit($id)
    {
        $projectType = $this->projectTypeRepository->find( $id );
        if( is_null($projectType) ) {
            return $this->modelNotFound();
        }

        return $this->projectTypeViewFactory->edit( $projectType );
    }

    public function update($id, UpdateProjectTypeFormRequest $request, ProjectTypeFactory $projectTypeFactory)
    {
        $projectType = $this->projectTypeRepository->find( $id );
        if( is_null($projectType) ) {
            return $this->modelNotFound();
        }

        $projectTypeFactory->modify( $projectType, $request->getInput() );

        return $this->redirect( 'admin.projectTypes.show', array('id' => $id), 'success', array( Translate::model( 'portfolio::projectType.edit.success' ) ) );
    }

    public function destroy($id)
    {
        $projectType = $this->projectTypeRepository->find( $id );
        if( is_null($projectType) ) {
            return $this->modelNotFound();
        }

        $projectType->delete();

        return $this->redirect( 'admin.projectTypes.index', array(), 'success', array( Translate::model( 'portfolio::projectType.delete.success' ) ) );
    }

    protected function modelNotFound()
    {
        return $this->redirect( 'admin.projectTypes.index', array(), 'error', array( Translate::model( 'portfolio::projectType.error.notFound' ) ) );
    }

}
