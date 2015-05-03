<?php namespace Ixudra\Portfolio\Interfaces\Http\Controllers;


use Ixudra\Portfolio\Http\Requests\Companies\FilterCompanyFormRequestInterface;
use Ixudra\Portfolio\Http\Requests\Companies\CreateCompanyFormRequestInterface;
use Ixudra\Portfolio\Http\Requests\Companies\UpdateCompanyFormRequestInterface;
use Ixudra\Portfolio\Repositories\Eloquent\EloquentCompanyRepositoryInterface;
use Ixudra\Portfolio\Services\Html\CompanyViewFactoryInterface;
use Ixudra\Portfolio\Services\Factories\CompanyFactoryInterface;

use Translate;

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
