<?php namespace Ixudra\Portfolio\Services\Factories;


use Ixudra\Portfolio\Models\Project;
use Ixudra\Imageable\Services\Factories\ImageFactory;
use Ixudra\Imageable\Traits\ImageFactoryTrait;

class ProjectFactory {

    use ImageFactoryTrait;


    protected $imageFactory;


    public function __construct(ImageFactory $imageFactory)
    {
        $this->imageFactory = $imageFactory;
    }


    public function make($input)
    {
        $project = Project::create( $input );
        $this->imageFactory->make( $this->extractImageInput( $input ), $project );

        return $project;
    }

    public function modify($project, $input)
    {
        $project->update( $input );
        $this->imageFactory->modify( $project->image, $this->extractImageInput( $input ), $project );

        return $project;
    }

}