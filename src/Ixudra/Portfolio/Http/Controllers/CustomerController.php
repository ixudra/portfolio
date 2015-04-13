<?php namespace Ixudra\Portfolio\Http\Controllers;


use Translate;

use Ixudra\Core\Http\Controllers\BaseController;

use Ixudra\Portfolio\Http\Requests\Customer\FilterCustomerFormRequest;
use Ixudra\Portfolio\Repositories\Eloquent\EloquentCustomerRepository;
use Ixudra\Portfolio\Services\Html\CustomerViewFactory;
use Ixudra\Portfolio\Services\Html\CompanyViewFactory;
use Ixudra\Portfolio\Services\Html\PersonViewFactory;

class CustomerController extends BaseController {

    protected $customerRepository;

    protected $customerViewFactory;

    protected $companyViewFactory;

    protected $personViewFactory;


    public function __construct(EloquentCustomerRepository $customerRepository, CustomerViewFactory $customerViewFactory, CompanyViewFactory $companyViewFactory, PersonViewFactory $personViewFactory)
    {
        $this->customerRepository = $customerRepository;
        $this->customerViewFactory = $customerViewFactory;
        $this->companyViewFactory = $companyViewFactory;
        $this->personViewFactory = $personViewFactory;
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

    public function show($id)
    {
        $customer = $this->customerRepository->find( $id );
        if( is_null($customer) ) {
            return $this->modelNotFound();
        }

        return $this->getViewFactory( $customer )->show( $customer->object );
    }

    public function edit($id)
    {
        $customer = $this->customerRepository->find( $id );
        if( is_null($customer) ) {
            return $this->modelNotFound();
        }

        return $this->getViewFactory( $customer )->edit( $customer->object );
    }

    public function destroy($id)
    {
        $customer = $this->customerRepository->find( $id );
        if( is_null($customer) ) {
            return $this->modelNotFound();
        }

        $customer->object->delete();

        return $this->redirect( 'admin.customers.index', array(), 'success', array( Translate::model( 'customer.delete.success' ) ) );
    }

    protected function modelNotFound()
    {
        return $this->redirect( 'admin.customers.index', array(), 'error', array( Translate::model( 'customer.error.notFound' ) ) );
    }

    protected function getViewFactory($customer)
    {
        if( $customer->object->getUrlKey() == 'companies' ) {
            return $this->companyViewFactory;
        }

        return $this->personViewFactory;
    }

}
