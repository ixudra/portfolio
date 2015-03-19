<?php namespace Ixudra\Portfolio\Services\Factories;


use Ixudra\Portfolio\Models\Project;

class ProjectFactory {

    public function make($input)
    {
        return Project::create( $input );
    }

    public function modify($project, $input)
    {
        return $project->update( $input );
    }

}