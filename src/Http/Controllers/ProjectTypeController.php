<?php namespace Ixudra\Portfolio\Http\Controllers;


use Ixudra\Core\Http\Controllers\BaseController;
use Ixudra\Portfolio\Interfaces\Repositories\ProjectTypeRepositoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Factories\ProjectTypeFactoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Html\ProjectTypeViewFactoryInterface;
use Ixudra\Portfolio\Http\Requests\ProjectTypes\CreateProjectTypeFormRequest;
use Ixudra\Portfolio\Http\Requests\ProjectTypes\FilterProjectTypeFormRequest;
use Ixudra\Portfolio\Http\Requests\ProjectTypes\UpdateProjectTypeFormRequest;

use Translate;

class ProjectTypeController extends BaseController {

    protected $projectTypeRepository;

    protected $projectTypeViewFactory;


    public function __construct(ProjectTypeRepositoryInterface $projectTypeRepository, ProjectTypeViewFactoryInterface $projectTypeViewFactory)
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

    public function store(CreateProjectTypeFormRequest $request, ProjectTypeFactoryInterface $projectTypeFactory)
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

    public function update($id, UpdateProjectTypeFormRequest $request, ProjectTypeFactoryInterface $projectTypeFactory)
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
