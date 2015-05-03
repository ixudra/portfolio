<?php namespace Ixudra\Portfolio\Http\Controllers;


use Ixudra\Portfolio\Http\Requests\Address\FilterAddressFormRequestInterface;
use Ixudra\Portfolio\Http\Requests\Address\CreateAddressFormRequestInterface;
use Ixudra\Portfolio\Http\Requests\Address\UpdateAddressFormRequestInterface;
use Ixudra\Portfolio\Repositories\Eloquent\EloquentAddressRepositoryInterface;
use Ixudra\Portfolio\Services\Html\AddressViewFactoryInterface;
use Ixudra\Portfolio\Services\Factories\AddressFactoryInterface;

use Translate;

interface AddressControllerInterface {

    public function index();

    public function filter(FilterAddressFormRequestInterface $request);

    public function create();

    public function store(CreateAddressFormRequestInterface $request, AddressFactoryInterface $addressFactory);

    public function show($id);

    public function edit($id);

    public function update($id, UpdateAddressFormRequestInterface $request, AddressFactoryInterface $addressFactory);

    public function destroy($id);

}
