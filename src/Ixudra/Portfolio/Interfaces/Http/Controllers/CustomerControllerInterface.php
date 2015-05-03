<?php namespace Ixudra\Portfolio\Interfaces\Http\Controllers;


use Ixudra\Portfolio\Http\Requests\Customer\FilterCustomerFormRequestInterface;
use Ixudra\Portfolio\Http\Requests\Customer\CreateCustomerFormRequestInterface;
use Ixudra\Portfolio\Http\Requests\Customer\UpdateCustomerFormRequestInterface;
use Ixudra\Portfolio\Repositories\Eloquent\EloquentCustomerRepositoryInterface;
use Ixudra\Portfolio\Services\Html\CustomerViewFactoryInterface;

use App;
use Translate;

interface CustomerControllerInterface {

    public function index();

    public function filter(FilterCustomerFormRequestInterface $request);

    public function create();

    public function store(CreateCustomerFormRequestInterface $request);

    public function show($id);

    public function edit($id);

    public function update($id, UpdateCustomerFormRequestInterface $request);

    public function destroy($id);

}
