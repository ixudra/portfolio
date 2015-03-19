<?php namespace Ixudra\Portfolio\Services\Factories;


use Ixudra\Portfolio\Models\ProjectType;

class ProjectTypeFactory {

    public function make($input)
    {
        return ProjectType::create( $input );
    }

    public function modify($projectType, $input)
    {
        return $projectType->update( $input );
    }

}