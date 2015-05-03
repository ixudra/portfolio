<?php namespace Ixudra\Portfolio\Interfaces\Services\Factories;


use Ixudra\Portfolio\Interfaces\Models\CompanyInterface;

interface CompanyFactoryInterface {

    public function make($input, $prefix = '');

    public function modify(CompanyInterface $company, $input, $prefix = '');

}