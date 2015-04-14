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

    public function getInputForSearch($input)
    {
        if( array_key_exists('_token', $input) ) {
            unset( $input[ '_token' ] );
        }

        $hidden = '';
        if( $input[ 'shown' ] === '1' ) {
            $hidden = '0';
        } else if( $input[ 'shown' ] === '0' ) {
            $hidden = '1';
        }

        $input[ 'hidden' ] = $hidden;
        unset( $input[ 'shown' ] );

        return $input;
    }

}