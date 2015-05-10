<?php namespace Ixudra\Portfolio\Services\Factories;


use Ixudra\Portfolio\Interfaces\Services\Factories\ProjectTypeFactoryInterface;
use Ixudra\Portfolio\Interfaces\Models\ProjectTypeInterface;

use App;

class ProjectTypeFactory implements ProjectTypeFactoryInterface {

    public function make($input)
    {
        $projectType = $this->createModel( $input );
        $projectType->save();

        return $projectType;
    }

    public function modify(ProjectTypeInterface $projectType, $input)
    {
        return $projectType->update( $input );
    }

    protected function createModel($input = array())
    {
        return App::make('\Ixudra\Portfolio\Interfaces\Models\ProjectTypeInterface', array($input));
    }

}