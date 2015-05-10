<?php namespace Ixudra\Portfolio\Http\Controllers;


use Ixudra\Core\Http\Controllers\BaseController;
use Ixudra\Portfolio\Interfaces\Repositories\CompanyRepositoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Factories\CompanyFactoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Html\CompanyViewFactoryInterface;
use Ixudra\Portfolio\Http\Requests\Companies\CreateCompanyFormRequest;
use Ixudra\Portfolio\Http\Requests\Companies\FilterCompanyFormRequest;
use Ixudra\Portfolio\Http\Requests\Companies\UpdateCompanyFormRequest;

use Translate;

class CompanyController extends BaseController {

    protected $companyRepository;

    protected $companyViewFactory;


    public function __construct(CompanyRepositoryInterface $companyRepository, CompanyViewFactoryInterface $companyViewFactory)
    {
        $this->companyRepository = $companyRepository;
        $this->companyViewFactory = $companyViewFactory;
    }


    public function index()
    {
        return $this->companyViewFactory->index();
    }

    public function filter(FilterCompanyFormRequest $request)
    {
        return $this->companyViewFactory->index( $request->getInput() );
    }

    public function create()
    {
        return $this->companyViewFactory->create();
    }

    public function store(CreateCompanyFormRequest $request, CompanyFactoryInterface $companyFactory)
    {
        $company = $companyFactory->make( $request->getInput(), 'company' );

        return $this->redirect( 'admin.companies.show', array('id' => $company->id), 'success', array( Translate::model( 'portfolio::company.create.success' ) ) );
    }

    public function show($id)
    {
        $company = $this->companyRepository->find( $id );
        if( is_null($company) ) {
            return $this->modelNotFound();
        }

        return $this->companyViewFactory->show( $company );
    }

    public function edit($id)
    {
        $company = $this->companyRepository->find( $id );
        if( is_null($company) ) {
            return $this->modelNotFound();
        }

        return $this->companyViewFactory->edit( $company );
    }

    public function update($id, UpdateCompanyFormRequest $request, CompanyFactoryInterface $companyFactory)
    {
        $company = $this->companyRepository->find( $id );
        if( is_null($company) ) {
            return $this->modelNotFound();
        }

        $companyFactory->modify( $company, $request->getInput() );

        return $this->redirect( 'admin.companies.show', array('id' => $id), 'success', array( Translate::model( 'portfolio::company.edit.success' ) ) );
    }

    public function destroy($id)
    {
        $company = $this->companyRepository->find( $id );
        if( is_null($company) ) {
            return $this->modelNotFound();
        }

        $company->delete();

        return $this->redirect( 'admin.companies.index', array(), 'success', array( Translate::model( 'portfolio::company.delete.success' ) ) );
    }

    protected function modelNotFound()
    {
        return $this->redirect( 'admin.companies.index', array(), 'error', array( Translate::model( 'portfolio::company.error.notFound' ) ) );
    }

}
