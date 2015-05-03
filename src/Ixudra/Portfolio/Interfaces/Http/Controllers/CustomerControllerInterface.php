<?php namespace Ixudra\Portfolio\Interfaces\Http\Controllers;


use Ixudra\Portfolio\Interfaces\Http\Requests\Customers\FilterCustomerFormRequestInterface;
use Ixudra\Portfolio\Interfaces\Http\Requests\Customers\CreateCustomerFormRequestInterface;
use Ixudra\Portfolio\Interfaces\Http\Requests\Customers\UpdateCustomerFormRequestInterface;

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
