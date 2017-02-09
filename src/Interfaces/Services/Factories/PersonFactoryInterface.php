<?php namespace Ixudra\Portfolio\Interfaces\Services\Factories;


use Ixudra\Portfolio\Interfaces\Models\PersonInterface;

interface PersonFactoryInterface {

    public function make($input, $prefix = '');

    public function modify(PersonInterface $person, $input, $prefix = '');

}