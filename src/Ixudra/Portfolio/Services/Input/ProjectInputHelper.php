<?php namespace Ixudra\Portfolio\Services\Input;


use Ixudra\Core\Services\Input\BaseInputHelper;
use Ixudra\Imageable\Models\Image;
use Ixudra\Portfolio\Models\Project;

class ProjectInputHelper extends BaseInputHelper {

    public function getInputForModel($model, $prefix = '')
    {
        return array_merge(
            $this->getPrefixedInput( $model->attributesToArray(), $prefix ),
            $this->getPrefixedInput( $model->image->attributesToArray() )
        );
    }

    public function getDefaultInput($prefix = '')
    {
        return array_merge(
            Project::getDefaults(),
            Image::getDefaults()
        );
    }

}