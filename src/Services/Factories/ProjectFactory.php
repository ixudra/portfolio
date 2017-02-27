<?php namespace Ixudra\Portfolio\Services\Factories;


use Ixudra\Portfolio\Interfaces\Services\Factories\ProjectFactoryInterface;
use Ixudra\Portfolio\Interfaces\Models\ProjectInterface;
use Ixudra\Imageable\Services\Factories\ImageFactory;
use Ixudra\Imageable\Traits\ImageFactoryTrait;

use App;

class ProjectFactory implements ProjectFactoryInterface {

    protected $imageFactory;


    public function __construct(ImageFactory $imageFactory)
    {
        $this->imageFactory = $imageFactory;
    }


    public function make($input)
    {
        $project = $this->createModel();
        $project->fill( $input );
        $project->save();

        $this->imageFactory->make( $input, $project );

        return $project;
    }

    public function modify(ProjectInterface $project, $input)
    {
        $project->update( $input );
        $this->imageFactory->modify( $project->image, $input, $project );

        return $project;
    }

    protected function createModel()
    {
        return App::make( 'Ixudra\Portfolio\Interfaces\Models\ProjectInterface' );
    }

}