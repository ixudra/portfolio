<?php namespace Ixudra\Portfolio\Interfaces\Http\Controllers;


use Ixudra\Portfolio\Interfaces\Http\Requests\Companies\FilterCompanyFormRequestInterface;
use Ixudra\Portfolio\Interfaces\Http\Requests\Companies\CreateCompanyFormRequestInterface;
use Ixudra\Portfolio\Interfaces\Http\Requests\Companies\UpdateCompanyFormRequestInterface;
use Ixudra\Portfolio\Interfaces\Services\Factories\CompanyFactoryInterface;

interface CompanyControllerInterface {

    public function index();

    public function filter(FilterCompanyFormRequestInterface $request);

    public function create();

    public function store(CreateCompanyFormRequestInterface $request, CompanyFactoryInterface $companyFactory);

    public function show($id);

    public function edit($id);

    public function update($id, UpdateCompanyFormRequestInterface $request, CompanyFactoryInterface $companyFactory);

    public function destroy($id);

}
