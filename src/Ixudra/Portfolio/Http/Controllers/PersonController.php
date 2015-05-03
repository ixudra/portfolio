<?php namespace Ixudra\Portfolio\Http\Controllers;


use Ixudra\Core\Http\Controllers\BaseController;
use Ixudra\Portfolio\Http\Requests\People\FilterPersonFormRequest;
use Ixudra\Portfolio\Http\Requests\People\CreatePersonFormRequest;
use Ixudra\Portfolio\Http\Requests\People\UpdatePersonFormRequest;
use Ixudra\Portfolio\Repositories\Eloquent\EloquentPersonRepository;
use Ixudra\Portfolio\Services\Html\PersonViewFactory;
use Ixudra\Portfolio\Services\Factories\PersonFactory;

use Translate;

class PersonController extends BaseController {

    protected $personViewFactory;


    public function __construct(EloquentPersonRepository $personRepository, PersonViewFactory $personViewFactory)
    {
        $this->personRepository = $personRepository;
        $this->personViewFactory = $personViewFactory;
    }


    public function index()
    {
        return $this->personViewFactory->index();
    }

    public function filter(FilterPersonFormRequest $request)
    {
        return $this->personViewFactory->index( $request->getInput() );
    }

    public function create()
    {
        return $this->personViewFactory->create();
    }

    public function store(CreatePersonFormRequest $request, PersonFactory $personFactory)
    {
        $person = $personFactory->make($request->getInput(), 'person', true);

        return $this->redirect( 'admin.people.show', array('id' => $person->id), 'success', array( Translate::model( 'portfolio::person.create.success' ) ) );
    }

    public function show($id)
    {
        $person = $this->personRepository->find( $id );
        if( is_null($person) ) {
            return $this->modelNotFound();
        }

        return $this->personViewFactory->show( $person );
    }

    public function edit($id)
    {
        $person = $this->personRepository->find( $id );
        if( is_null($person) ) {
            return $this->modelNotFound();
        }

        return $this->personViewFactory->edit( $person );
    }

    public function update($id, UpdatePersonFormRequest $request, PersonFactory $personFactory)
    {
        $person = $this->personRepository->find( $id );
        if( is_null($person) ) {
            return $this->modelNotFound();
        }

        $personFactory->modify($person, $request->getInput(), '', true);

        return $this->redirect( 'admin.people.show', array('id' => $id), 'success', array( Translate::model( 'portfolio::person.edit.success' ) ) );
    }

    public function destroy($id)
    {
        $person = $this->personRepository->find( $id );
        if( is_null($person) ) {
            return $this->modelNotFound();
        }

        $person->delete();

        return $this->redirect( 'admin.people.index', array(), 'success', array( Translate::model( 'portfolio::person.delete.success' ) ) );
    }

    protected function modelNotFound()
    {
        return $this->redirect( 'admin.people.index', array(), 'error', array( Translate::model( 'portfolio::person.error.notFound' ) ) );
    }

}
