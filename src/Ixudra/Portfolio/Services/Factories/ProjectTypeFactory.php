<?php namespace Ixudra\Portfolio\Services\Factories;


use Ixudra\Portfolio\Interfaces\Services\Factories\ProjectTypeFactoryInterface;
use Ixudra\Portfolio\Interfaces\Models\ProjectTypeInterface;

class ProjectTypeFactory implements ProjectTypeFactoryInterface {

    public function make($input)
    {
        return ProjectTypeInterface::create( $input );
    }

    public function modify(ProjectTypeInterface $projectType, $input)
    {
        return $projectType->update( $input );
    }

}