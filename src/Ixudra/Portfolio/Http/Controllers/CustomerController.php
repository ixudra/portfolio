<?php namespace Ixudra\Portfolio\Http\Controllers;


use Translate;

use Ixudra\Core\Http\Controllers\BaseController;

use Ixudra\Portfolio\Http\Requests\Customer\FilterCustomerFormRequest;
use Ixudra\Portfolio\Http\Requests\Customer\CreateCustomerFormRequest;
use Ixudra\Portfolio\Http\Requests\Customer\UpdateCustomerFormRequest;
use Ixudra\Portfolio\Repositories\Eloquent\EloquentCustomerRepository;
use Ixudra\Portfolio\Services\Html\CustomerViewFactory;
use Ixudra\Portfolio\Services\Factories\CustomerFactory;

class CustomerController extends BaseController {

    protected $customerViewFactory;


    public function __construct(EloquentCustomerRepository $customerRepository, CustomerViewFactory $customerViewFactory)
    {
        $this->customerRepository = $customerRepository;
        $this->customerViewFactory = $customerViewFactory;
    }


    public function index()
    {
        return $this->customerViewFactory->index();
    }

    public function filter(FilterCustomerFormRequest $request)
    {
        return $this->customerViewFactory->index( $request->getInput() );
    }

    public function create()
    {
        return $this->customerViewFactory->create();
    }

    public function store(CreateCustomerFormRequest $request, CustomerFactory $customerFactory)
    {
        $customer = $customerFactory->make( $request->getInput() );

        return $this->redirect( 'admin.customers.show', array('id' => $customer->id), 'success', array( Translate::model( 'customer.create.success' ) ) );
    }

    public function show($id)
    {
        $customer = $this->customerRepository->find( $id );
        if( is_null($customer) ) {
            return $this->modelNotFound();
        }

        return $this->customerViewFactory->show( $customer );
    }

    public function edit($id)
    {
        $customer = $this->customerRepository->find( $id );
        if( is_null($customer) ) {
            return $this->modelNotFound();
        }

        return $this->customerViewFactory->edit( $customer );
    }

    public function update($id, UpdateCustomerFormRequest $request, CustomerFactory $customerFactory)
    {
        $customer = $this->customerRepository->find( $id );
        if( is_null($customer) ) {
            return $this->modelNotFound();
        }

        $customerFactory->modify( $customer, $request->getInput() );

        return $this->redirect( 'admin.customers.show', array('id' => $id), 'success', array( Translate::model( 'customer.edit.success' ) ) );
    }

    public function destroy($id)
    {
        $customer = $this->customerRepository->find( $id );
        if( is_null($customer) ) {
            return $this->modelNotFound();
        }

        $customer->delete();

        return $this->redirect( 'admin.customers.index', array(), 'success', array( Translate::model( 'customer.delete.success' ) ) );
    }

    protected function modelNotFound()
    {
        return $this->redirect( 'admin.customers.index', array(), 'error', array( Translate::model( 'customer.error.notFound' ) ) );
    }

}
