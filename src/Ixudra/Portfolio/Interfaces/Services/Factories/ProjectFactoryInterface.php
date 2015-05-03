<?php namespace Ixudra\Portfolio\Interfaces\Services\Factories;


use Ixudra\Portfolio\Interfaces\Models\ProjectInterface;

interface ProjectFactoryInterface {

    public function make($input);

    public function modify(ProjectInterface $project, $input);

}