<?php namespace Ixudra\Portfolio\Interfaces\Services\Factories;


use Ixudra\Portfolio\Interfaces\Models\CustomerModelInterface;

interface CustomerFactoryInterface {

    public function make(CustomerModelInterface $object);

}