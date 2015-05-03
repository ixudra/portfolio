<?php namespace Ixudra\Portfolio\Interfaces\Services\Html;


use Ixudra\Portfolio\Interfaces\Models\CompanyInterface;

interface CompanyViewFactory {

    public function index($input = array());

    public function create($input = null);

    public function show(CompanyInterface $company);

    public function edit(CompanyInterface $company, $input = null);

}
