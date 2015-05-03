<?php namespace Ixudra\Portfolio\Http\Controllers;


use Ixudra\Core\Http\Controllers\BaseController;
use Ixudra\Portfolio\Http\Requests\Addresses\FilterAddressFormRequest;
use Ixudra\Portfolio\Http\Requests\Addresses\CreateAddressFormRequest;
use Ixudra\Portfolio\Http\Requests\Addresses\UpdateAddressFormRequest;
use Ixudra\Portfolio\Repositories\Eloquent\EloquentAddressRepository;
use Ixudra\Portfolio\Services\Html\AddressViewFactory;
use Ixudra\Portfolio\Services\Factories\AddressFactory;

use Translate;

class AddressController extends BaseController {

    protected $addressViewFactory;


    public function __construct(EloquentAddressRepository $addressRepository, AddressViewFactory $addressViewFactory)
    {
        $this->addressRepository = $addressRepository;
        $this->addressViewFactory = $addressViewFactory;
    }


    public function index()
    {
        return $this->addressViewFactory->index();
    }

    public function filter(FilterAddressFormRequest $request)
    {
        return $this->addressViewFactory->index( $request->getInput() );
    }

    public function create()
    {
        return $this->addressViewFactory->create();
    }

    public function store(CreateAddressFormRequest $request, AddressFactory $addressFactory)
    {
        $address = $addressFactory->make( $request->getInput() );

        return $this->redirect( 'admin.addresses.show', array('id' => $address->id), 'success', array( Translate::model( 'portfolio::address.create.success' ) ) );
    }

    public function show($id)
    {
        $address = $this->addressRepository->find( $id );
        if( is_null($address) ) {
            return $this->modelNotFound();
        }

        return $this->addressViewFactory->show( $address );
    }

    public function edit($id)
    {
        $address = $this->addressRepository->find( $id );
        if( is_null($address) ) {
            return $this->modelNotFound();
        }

        return $this->addressViewFactory->edit( $address );
    }

    public function update($id, UpdateAddressFormRequest $request, AddressFactory $addressFactory)
    {
        $address = $this->addressRepository->find( $id );
        if( is_null($address) ) {
            return $this->modelNotFound();
        }

        $addressFactory->modify( $address, $request->getInput() );

        return $this->redirect( 'admin.addresses.show', array('id' => $id), 'success', array( Translate::model( 'portfolio::address.edit.success' ) ) );
    }

    public function destroy($id)
    {
        $address = $this->addressRepository->find( $id );
        if( is_null($address) ) {
            return $this->modelNotFound();
        }

        $address->delete();

        return $this->redirect( 'admin.addresses.index', array(), 'success', array( Translate::model( 'portfolio::address.delete.success' ) ) );
    }

    protected function modelNotFound()
    {
        return $this->redirect( 'admin.addresses.index', array(), 'error', array( Translate::model( 'portfolio::address.error.notFound' ) ) );
    }

}
