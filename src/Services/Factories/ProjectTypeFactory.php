<?php namespace Ixudra\Portfolio\Services\Factories;


use Ixudra\Core\Services\Factories\BaseFactory;
use Ixudra\Portfolio\Interfaces\Services\Factories\ProjectTypeFactoryInterface;
use Ixudra\Portfolio\Interfaces\Models\ProjectTypeInterface;

use App;
use Config;

class ProjectTypeFactory extends BaseFactory implements ProjectTypeFactoryInterface {

    public function make($input, $prefix = '')
    {
        $projectType = $this->createModel();
        $projectType->fill( $this->extractProjectTypeInput( $input, $prefix, true ) );
        $projectType->save();

        return $projectType;
    }

    public function modify(ProjectTypeInterface $projectType, $input, $prefix = '')
    {
        return $projectType->update( $this->extractProjectTypeInput( $input, $prefix ) );
    }

    protected function extractProjectTypeInput($input, $prefix, $includeDefaults = false)
    {
        $projectTypeClassName = Config::get('bindings.models.projectType');

        $results = $this->extractInput( $input, $projectTypeClassName::getDefaults(), $prefix, $includeDefaults );

        return $results;
    }

    protected function createModel()
    {
        return App::make( ProjectTypeInterface::class );
    }

}
