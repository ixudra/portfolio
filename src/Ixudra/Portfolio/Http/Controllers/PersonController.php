<?php namespace Ixudra\Portfolio\Http\Controllers;


use Ixudra\Core\Http\Controllers\BaseController;
use Ixudra\Portfolio\Interfaces\Http\Controllers\PersonControllerInterface;
use Ixudra\Portfolio\Interfaces\Http\Requests\People\CreatePersonFormRequestInterface;
use Ixudra\Portfolio\Interfaces\Http\Requests\People\FilterPersonFormRequestInterface;
use Ixudra\Portfolio\Interfaces\Http\Requests\People\UpdatePersonFormRequestInterface;
use Ixudra\Portfolio\Interfaces\Repositories\PersonRepositoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Factories\PersonFactoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Html\PersonViewFactoryInterface;

use Translate;

class PersonController extends BaseController implements PersonControllerInterface {

    protected $personRepository;

    protected $personViewFactory;


    public function __construct(PersonRepositoryInterface $personRepository, PersonViewFactoryInterface $personViewFactory)
    {
        $this->personRepository = $personRepository;
        $this->personViewFactory = $personViewFactory;
    }


    public function index()
    {
        return $this->personViewFactory->index();
    }

    public function filter(FilterPersonFormRequestInterface $request)
    {
        return $this->personViewFactory->index( $request->getInput() );
    }

    public function create()
    {
        return $this->personViewFactory->create();
    }

    public function store(CreatePersonFormRequestInterface $request, PersonFactoryInterface $personFactory)
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

    public function update($id, UpdatePersonFormRequestInterface $request, PersonFactoryInterface $personFactory)
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
