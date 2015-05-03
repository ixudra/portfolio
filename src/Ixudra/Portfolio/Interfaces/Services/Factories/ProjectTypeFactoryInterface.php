<?php namespace Ixudra\Portfolio\Interfaces\Services\Factories;


use Ixudra\Portfolio\Interfaces\Models\ProjectTypeInterface;

interface ProjectTypeFactoryInterface {

    public function make($input);

    public function modify(ProjectTypeInterface $projectType, $input);

}