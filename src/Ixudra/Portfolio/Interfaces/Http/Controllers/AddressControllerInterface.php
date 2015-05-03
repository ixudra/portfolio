<?php namespace Ixudra\Portfolio\Interfaces\Http\Controllers;


use Ixudra\Portfolio\Interfaces\Http\Requests\Addresses\FilterAddressFormRequestInterface;
use Ixudra\Portfolio\Interfaces\Http\Requests\Addresses\CreateAddressFormRequestInterface;
use Ixudra\Portfolio\Interfaces\Http\Requests\Addresses\UpdateAddressFormRequestInterface;
use Ixudra\Portfolio\Interfaces\Services\Factories\AddressFactoryInterface;

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
