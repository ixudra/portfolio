<?php namespace Ixudra\Portfolio\Services\Factories;


use Ixudra\Portfolio\Interfaces\Services\Factories\ProjectFactoryInterface;
use Ixudra\Portfolio\Interfaces\Models\ProjectInterface;
use Ixudra\Imageable\Services\Factories\ImageFactory;
use Ixudra\Imageable\Traits\ImageFactoryTrait;

class ProjectFactory implements ProjectFactoryInterface {

    use ImageFactoryTrait;


    protected $imageFactory;


    public function __construct(ImageFactory $imageFactory)
    {
        $this->imageFactory = $imageFactory;
    }


    public function make($input)
    {
        $project = ProjectInterface::create( $input );
        $this->imageFactory->make( $this->extractImageInput( $input ), $project );

        return $project;
    }

    public function modify(ProjectInterface $project, $input)
    {
        $project->update( $input );
        $this->imageFactory->modify( $project->image, $this->extractImageInput( $input ), $project );

        return $project;
    }

}