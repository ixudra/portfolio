<?php namespace Ixudra\Portfolio\Interfaces\Services\Html;


use Ixudra\Portfolio\Interfaces\Models\AddressInterface;

interface AddressViewFactoryInterface {

    public function index($input = array());

    public function create($input = null);

    public function show(AddressInterface $address);

    public function edit(AddressInterface $address, $input = null);

}
