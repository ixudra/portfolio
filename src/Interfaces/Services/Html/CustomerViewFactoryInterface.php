<?php namespace Ixudra\Portfolio\Interfaces\Services\Html;


use Ixudra\Portfolio\Interfaces\Models\CustomerInterface;

interface CustomerViewFactoryInterface {

    public function index($input = array());

    public function create($input = null);

    public function show(CustomerInterface $customer);

    public function edit(CustomerInterface $customer, $input = null);

}
