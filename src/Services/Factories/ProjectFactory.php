<?php namespace Ixudra\Portfolio\Services\Factories;


use Ixudra\Core\Services\Factories\BaseFactory;
use Ixudra\Portfolio\Interfaces\Services\Factories\ProjectFactoryInterface;
use Ixudra\Portfolio\Interfaces\Models\ProjectInterface;
use Ixudra\Imageable\Services\Factories\ImageFactory;

use App;
use Config;

class ProjectFactory extends BaseFactory implements ProjectFactoryInterface {

    protected $imageFactory;


    public function __construct(ImageFactory $imageFactory)
    {
        $this->imageFactory = $imageFactory;
    }


    public function make($input, $prefix = '')
    {
        $project = $this->createModel();
        $project->fill( $this->extractProjectInput( $input, $prefix, true ) );
        $project->save();

        $this->imageFactory->make( $input, $project );

        return $project;
    }

    public function modify(ProjectInterface $project, $input, $prefix = '')
    {
        $project->update( $this->extractProjectInput( $input, $prefix ) );
        $this->imageFactory->modify( $project->image, $input, $project, $prefix );

        return $project;
    }

    protected function extractProjectInput($input, $prefix, $includeDefaults = false)
    {
        $projectClassName = Config::get('bindings.models.project');

        $results = $this->extractInput( $input, $projectClassName::getDefaults(), $prefix, $includeDefaults );

        return $results;
    }

    protected function createModel()
    {
        return App::make( ProjectInterface::class );
    }

}
