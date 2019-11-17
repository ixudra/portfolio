<?php namespace Ixudra\Portfolio\Services\Input;


use Ixudra\Core\Services\Input\BaseInputHelper;
use Ixudra\Portfolio\Interfaces\Services\Input\ProjectInputHelperInterface;
use Ixudra\Imageable\Models\Image;

use Config;

class ProjectInputHelper extends BaseInputHelper implements ProjectInputHelperInterface {

    public function getInputForModel($model, $prefix = '')
    {
        return array_merge(
            $this->getPrefixedInput( $model->attributesToArray(), $prefix ),
            $this->getPrefixedInput( $model->image->attributesToArray() )
        );
    }

    public function getDefaultInput($prefix = '')
    {
        $projectClassName = Config::get('bindings.models.project');

        return array_merge(
            $projectClassName::getDefaults(),
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

